<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\FoundRound;
use Illuminate\Http\Request;
use App\Models\InvestmentPortfolio;
use Illuminate\Support\Facades\Auth;

class MyInvestmentPortfolioController extends Controller
{
    public function __construct(private InvestmentPortfolio $investment_portfolio,) 
    {

    }


    public function investment_portofolio(Request $request)
    {
        if (auth('investor')->check()) {
            $investment_portfolio = $this->investment_portfolio->where(['investor_id'=>auth('investor')->user()->id,'found_round_id'=>$request->round_id])->first();
            if ($investment_portfolio) {
                $investment_portfolio->delete();
                $investment_portfolio_num = $this->investment_portfolio->where(['found_round_id'=>$request->round_id])->count();

                return response()->json([
                    'message' => __("تم الحذف من المحفظة الاستثمارية بنجاح")." !",
                    'value' => 2,
                    'investment_portfolio_num' => $investment_portfolio_num,
                ]);

            } else {
                $this->investment_portfolio->insert([
                    'investor_id'=>auth('investor')->id(),
                    'found_round_id'=>$request->round_id,
                    'created_at'=>Carbon::now(),
                ]);
                $investment_portfolio_num = $this->investment_portfolio->where(['found_round_id'=>$request->round_id])->count();

                return response()->json([
                    'message' => __("تمت الإضافة للمحفظة الاستثمارية بنجاح")." !",
                    'value' => 1,
                    'investment_portfolio_num' => $investment_portfolio_num,
                ]);
            }
        }else{
            return response()->json([
                'message' => __("login_first"),
                'value' => 0,
            ]);
        }

    }

    public function my_investment_portofolio(Request $request){
        $opportunities = FoundRound::where(function ($query) use ($request) {
            if ($request->from) {
                $query->where('round_amount', '>=', $request->from);
            }
            
            if ($request->to) {
                $query->where('round_amount', '<=', $request->to);
            }
        })
        ->when(Auth::guard('investor')->check(), function ($query) {
            $query->whereIn('id', Auth::guard('investor')->user()->investmentPortfolio->pluck('id'));
        })
        ->latest()
        ->get();
                
        $investment_portfolios = Auth::guard('investor')->user()->investmentPortfolio->pluck('id')->toArray();

        return view('investor.investment-portfolio.index', compact('opportunities', 'investment_portfolios'));
    }
}
