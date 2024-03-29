<?php

namespace App\Http\Controllers;


use App\Models\Task;
use App\Models\User;
use App\Models\Company;
use App\Models\Setting;
use App\Models\Projects;
use App\Models\TaskGoal;

use Illuminate\Http\Request;
use Meneses\LaravelMpdf\Facades\LaravelMpdf as PDF;
use Mpdf\Mpdf;

use Illuminate\Support\Facades\DB;
use App\Models\FinancialEvaluation;
use App\Models\FixedInvestedCapital;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\PlanningCostAssumption;

use App\Models\ProjectRevenuePlanning;

use Dompdf\Dompdf;

use App\Models\WorkingInvestedCapital;
use App\Models\PlanningRevenueOperatingAssumption;
use App\Models\Solve;
use App\Models\Theme;

class MyPlanController extends BaseController
{
    //
    
    public function index(){
       
        
        // $user = User::where('super_admin', 1)->first();
        $user = Auth::user();
        
        $settings_mod = Setting::where('workspace_id', $user->workspace_id)->get()->keyBy('key');
        if (isset($settings_mod['currency'])) {
            $currency = $settings_mod['currency']->value;
        } else {
            $currency = config('app.currency');
        }
        $data = [];
        if(FinancialEvaluation::where('workspace_id',$user->workspace_id)->select('value')->first()){
            $data['FinancialEvaluation'] = formatCurrency(FinancialEvaluation::where('workspace_id',$user->workspace_id)->select('value')->first()['value'],getWorkspaceCurrency($this->settings));
        }else{
            $data['FinancialEvaluation'] = 0;
        };
        $data['selected_navigation'] = "billing";
        $data['projectRevenues'] = ProjectRevenuePlanning::with(['sources'])
            ->where('workspace_id', $this->user->workspace_id)
            ->get();
        $data['tasks'] = Task::where(
            "workspace_id",
            $this->user->workspace_id
        )->get();
        $data['task_goal'] = TaskGoal::where(
            "workspace_id",
            $this->user->workspace_id
        )->first();
        $data['fixedInvested'] = FixedInvestedCapital::where("workspace_id", $this->user->workspace_id)->get();
        $data['workingInvested'] = WorkingInvestedCapital::where("workspace_id", $this->user->workspace_id)->get();
        $fixedChart = [];
        $workingChart = [];
        foreach ($data['fixedInvested'] as $key =>$item){
            $fixedChart[] = ['y' => $item->investing_price, 'label' => $key+1 . ' - '. $item->investing_description . ' : ' . $item->investing_price. ' ريال سعودي' ];
        }
        foreach ($data['workingInvested'] as $key =>$item){
            $workingChart[] = ['y' => $item->investing_annual_cost, 'label' => $item->investing_description . ' : ' .$item->investing_annual_cost . ' ريال سعودي'];
        }
        $data['fixedChart'] = $fixedChart;
        $data['workingChart'] = $workingChart;
        $data['planningCostAssumption'] = PlanningCostAssumption::where(['workspace_id' =>$this->user->workspace_id])->first();
        $data['planningRevenueOperatingAssumptions'] = PlanningRevenueOperatingAssumption::where('workspace_id', $this->user?->workspace_id)->first();
        // dd($data['planningRevenueOperatingAssumptions']->calc_total);
        if($data['planningRevenueOperatingAssumptions']){
            $data['calc_total'] = $data['planningRevenueOperatingAssumptions']->calc_total;
        }else{
            $data['calc_total'] = [];
        }
        $workingInvestedTotal = WorkingInvestedCapital::select(DB::raw('SUM(investing_annual_cost) as investing_annual_cost_total'))->where("workspace_id", $this->user->workspace_id)->get()->pluck('investing_annual_cost_total');
        $fixedInvestedTotal = FixedInvestedCapital::select(DB::raw('SUM(investing_price) as investing_price_total'))->where("workspace_id", $this->user->workspace_id)->get()->pluck('investing_price_total');
        $totalInvestedCapital = (!empty($workingInvestedTotal) ? $workingInvestedTotal[0] : 0.0)+(!empty($fixedInvestedTotal) ? $fixedInvestedTotal[0] : 0.0);
        $data['totalInvestedCapital'] = formatCurrency($totalInvestedCapital,getWorkspaceCurrency($this->settings));
        $data['NegativetotalInvestedCapital'] = formatCurrency($totalInvestedCapital * -1,getWorkspaceCurrency($this->settings));

        foreach ($data['workingChart'] as $key => $value) {
            $data['workingChart'][$key]['label'] = ($key + 1) . '- SAR ' . str_replace('ريال سعودي', '', $value['label']);
        }


        foreach ($data['fixedChart'] as &$value) {
            $value = str_replace('ريال سعودي', '', $value);
            $value = str_replace('-', '- SAR', $value);
        }

        $planningRevenueOperatingAssumptions =\App\Models\PlanningRevenueOperatingAssumption::query()->where('workspace_id', auth()->user()->workspace_id)->first();
        $first_year_percentage =  $planningRevenueOperatingAssumptions? $planningRevenueOperatingAssumptions->first_year / 100: .50;
        $second_year_percentage = $planningRevenueOperatingAssumptions? $planningRevenueOperatingAssumptions->second_year / 100: 1;
        $third_year_percentage = $planningRevenueOperatingAssumptions? $planningRevenueOperatingAssumptions->third_year / 100: 1;

        $first_year_total_revenues_expectations = (\App\Models\ProjectRevenuePlanning::calcTotalRevenueFirstYear() * $first_year_percentage );
        $second_year_total_revenues_expectations = (\App\Models\ProjectRevenuePlanning::calcTotalRevenueSecondYear() * $second_year_percentage) ;
        $third_year_total_revenues_expectations = (\App\Models\ProjectRevenuePlanning::calcTotalRevenueThirdYear()  * $third_year_percentage);

        $data['total_revenues_expectations']['first_year'] = $first_year_total_revenues_expectations;
        $data['total_revenues_expectations']['second_year'] = $second_year_total_revenues_expectations;
        $data['total_revenues_expectations']['third_year'] = $third_year_total_revenues_expectations;

        $project_cumulative_free_cash_flow_first_year = 0;
        $project_cumulative_free_cash_flow_second_year = 0;
        $project_cumulative_free_cash_flow_third_year = 0;
        if($data['calc_total']){
            $project_cumulative_free_cash_flow_first_year = $data['calc_total']['first_year_net_cash_flow_number'] - abs($totalInvestedCapital);
            if($project_cumulative_free_cash_flow_first_year < 0){
                $project_cumulative_free_cash_flow_second_year = $data['calc_total']['second_year_net_cash_flow_number'] - abs($project_cumulative_free_cash_flow_first_year);
            }else{
                $project_cumulative_free_cash_flow_second_year = 0;
            }
            if($project_cumulative_free_cash_flow_second_year < 0){
                $project_cumulative_free_cash_flow_third_year = $data['calc_total']['third_year_net_cash_flow_number'] - abs($project_cumulative_free_cash_flow_second_year);
            }else{
                $project_cumulative_free_cash_flow_third_year = 0;
            }
        }
    
        $data['project_cumulative_free_cash_flow']['first_year'] = formatCurrency($project_cumulative_free_cash_flow_first_year,getWorkspaceCurrency($this->settings));
        $data['project_cumulative_free_cash_flow']['second_year'] = $project_cumulative_free_cash_flow_second_year !== '' ? formatCurrency($project_cumulative_free_cash_flow_second_year,getWorkspaceCurrency($this->settings)) : '';
        $data['project_cumulative_free_cash_flow']['third_year'] = $project_cumulative_free_cash_flow_third_year !== '' ? formatCurrency($project_cumulative_free_cash_flow_third_year,getWorkspaceCurrency($this->settings)) : '';
        $data['capital_recovery_period']['first_year'] = 0;$data['capital_recovery_period']['second_year'] = 0;
        if($project_cumulative_free_cash_flow_first_year < 0){
            $data['capital_recovery_period']['first_year'] = 1;
        }
        if($project_cumulative_free_cash_flow_second_year < 0){
            $data['capital_recovery_period']['second_year'] = 1;
        }else{
            if($data['calc_total']){
                $data['capital_recovery_period']['second_year']  = ceil(abs($project_cumulative_free_cash_flow_first_year) / $data['calc_total']['second_year_net_cash_flow_number']) / 10;
            }
        }

        $data['TotalRevenueFirstYear']= \App\Models\ProjectRevenuePlanning::calcTotalRevenueFirstYear();
        $data['TotalRevenueSecondYear'] = \App\Models\ProjectRevenuePlanning::calcTotalRevenueSecondYear();
        $data['TotalRevenueThirdYear'] = \App\Models\ProjectRevenuePlanning::calcTotalRevenueThirdYear();
        

        return view('myPlane.index', $data);
    }



    public function showinvestdownload()
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

        // Pass the data to the view
          
        $data = [
            'companydesc' => $companydesc,
            'solves' => $solves,
            'image1' => $image1,
            'image2' => $image2,
            'image3' => $image3,
            'image4' => $image4,
            'image5' => $image5,
        ];

        // $pdf = new Dompdf();
        // $pdf->loadHtml(View::make('livewire.show-invest-show', $data)->render());
        // $pdf->setPaper('A4', 'landscape');
        // $pdf->render();
        // $filename = 'investshow.pdf';
        // return $pdf->stream($filename);

        // $pdf = PDF::loadView('livewire.show-invest-show', $data);
        // return $pdf->stream('document.pdf');


    
        
    }

    public function showinvestshow(){
        return view('myPlane.showinvestshow');
    }
    public function investshow(){
        // $projects = Projects::latest()->get()->take(3);
        // return view('myPlane.investshow',compact('projects'));
        $planningRevenueOperatingAssumptions = PlanningRevenueOperatingAssumption::where('workspace_id', auth()->user()->workspace_id)->first();
        $selected_navigation = 'investshow';
        return view('myPlane.investshow',compact('planningRevenueOperatingAssumptions','selected_navigation'));
    }
    // public function update(Request $request){
    //     $request->validate([
    //         "company_desc"=> "nullable|string|max:500",
    //     ]);
    //     Company::updateOrCreate(
    //         ['business_pioneer_id' => Auth::user()->id],
    //         [
    //             'company_description' => $request->company_desc,
    //         ]
    //     );
    //      return redirect()->back();
    // }
    // public function updateproject(Request $request ,$id){
    //     // dd($request->all());
    //     $project = Projects::findOrFail($id);
    //     $request->validate([
    //         "summary"=> "nullable|string|max:500",
    //     ]);
    //     $project->summary = $request->summary;
    //     $project->update();
    //      return redirect()->back();
    // }
}
