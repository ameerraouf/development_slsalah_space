<?php

namespace App\Http\Livewire;

use App\Models\Company;
use App\Models\Compat;
use App\Models\FinancialEvaluation;
use App\Models\Market;
use App\Models\PlanningCostAssumption;
use App\Models\PlanningFinancialAssumption;
use App\Models\PlanningRevenueOperatingAssumption;
use App\Models\RequiredInvestment;
use App\Models\Solve;
use App\Models\Team;
use App\Models\Theme;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowInvestShow extends Component
{
    public function render()
    {
           $user = Auth::user();
           $themeuserid = auth()->user()->themeuser->first()->value('id');
           $themeuser = Theme::whereId($themeuserid)->first();
           $image1 = $themeuser->image1;
           $image2 = $themeuser->image2;
           $image3 = $themeuser->image3;
           $image4 = $themeuser->image4;
           $image5 = $themeuser->image5;

           $companydesc = Company::where('business_pioneer_id',$user->id)->value('company_description');
           $solves = Solve::where('user_id',$user->id)->get();

           $markets = Market::where('user_id',$user->id)->take(5)->get();
           foreach ($markets  as $market) {
                $myear[] = $market->year;
                $msize[] = $market->size;
                $munit[] = $market->unit;
            }

            $planningRevenueOperatingAssumptions = PlanningRevenueOperatingAssumption::where('workspace_id', auth()->user()->workspace_id)->first();
            $all_revenues_forecasting = $planningRevenueOperatingAssumptions ? $planningRevenueOperatingAssumptions->all_revenues_forecasting : ['first_year' => 0, 'second_year' => 0, 'third_year' => 0];
            $all_revenues_costs_forecasting = $planningRevenueOperatingAssumptions ? $planningRevenueOperatingAssumptions->all_revenues_costs_forecasting : ['first_year' => 0, 'second_year' => 0, 'third_year' => 0];
            $planningCostAssumption = PlanningCostAssumption::where(['workspace_id' => auth()->user()->workspace_id])
                ->first();
            $planningFinancialAssumption = PlanningFinancialAssumption::where('workspace_id', auth()->user()->workspace_id)
                ->first();
            $selected_navigation = 'IncomeList';
            $calc_total = $planningRevenueOperatingAssumptions ? $planningRevenueOperatingAssumptions->calc_total : [];
            $TAM = 0; $SAM = 0; $SOM = 0;
            $TAM = $this->size5 ?? 0 ;
            if($TAM){
                $SAM = $TAM * 0.25;
                $SOM = $SAM * 0.07;
            }
            $financial_evaluation = 0 ;
            if(FinancialEvaluation::where('workspace_id',auth()->user()->workspace_id)){
                $financial_evaluation = FinancialEvaluation::where('workspace_id',auth()->user()->workspace_id)->select('value')->first()['value'];
            }
            $unitForChart = $this->unit5 ?? '';
            $requiredInvestmentForChart = RequiredInvestment::latest()->first();

            $selectedCompat = Compat::where('user_id',$user->id)->take(6)->get(); // Fetch 6 compats
            $selectedteam = Team::where('user_id',$user->id)->take(4)->get(); // Fetch 4 team

        return view('livewire.show-invest-show',compact( 
        'image1',
        'image2',
        'image3',
        'image4',
        'image5',
        'companydesc',
        'solves',
        'myear',
        'msize',
        'munit',
        'TAM',
        'SAM',
        'SOM',
        'calc_total',
        'requiredInvestmentForChart',
        'financial_evaluation',
        'unitForChart',
        'all_revenues_forecasting',
        'selectedCompat',
        'selectedteam',
       ));
    }
}
