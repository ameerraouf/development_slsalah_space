<?php

namespace App\Http\Controllers;


use App\Models\Company;
use App\Models\FixedInvestedCapital;
use App\Models\PlanningCostAssumption;
use App\Models\PlanningRevenueOperatingAssumption;
use App\Models\ProjectRevenuePlanning;
use App\Models\Projects;

use App\Models\Task;
use App\Models\User;
use App\Models\Setting;
use App\Models\TaskGoal;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

use mikehaertl\wkhtmlto\Pdf;



use App\Models\WorkingInvestedCapital;


class MyPlanController extends BaseController
{
    //

    public function index(){

        $user = User::where('super_admin', 1)->first();

        $settings_mod = Setting::where('workspace_id', $user->workspace_id)->get()->keyBy('key');
        if (isset($settings_mod['currency'])) {
            $currency = $settings_mod['currency']->value;
        } else {
            $currency = config('app.currency');
        }

        $data = [];
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
        $data['planningCostAssumption'] = PlanningCostAssumption::where(['workspace_id' =>$this->user->workspace_id])
            ->first();
        $data['planningRevenueOperatingAssumptions'] = PlanningRevenueOperatingAssumption::where('workspace_id', $this->user->workspace_id)
            ->first();
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


        $project_cumulative_free_cash_flow_first_year = $data['calc_total']['first_year_net_cash_flow_number'] - abs($totalInvestedCapital);
        if($project_cumulative_free_cash_flow_first_year < 0){
            $project_cumulative_free_cash_flow_second_year = $data['calc_total']['second_year_net_cash_flow_number'] - abs($project_cumulative_free_cash_flow_first_year);
        }else{
            $project_cumulative_free_cash_flow_second_year = '';
        }
        if($project_cumulative_free_cash_flow_second_year < 0){
            $project_cumulative_free_cash_flow_third_year = $data['calc_total']['third_year_net_cash_flow_number'] - abs($project_cumulative_free_cash_flow_second_year);
        }else{
            $project_cumulative_free_cash_flow_third_year = '';
        }
        $data['project_cumulative_free_cash_flow']['first_year'] = formatCurrency($project_cumulative_free_cash_flow_first_year,getWorkspaceCurrency($this->settings));
        $data['project_cumulative_free_cash_flow']['second_year'] = $project_cumulative_free_cash_flow_second_year !== '' ? formatCurrency($project_cumulative_free_cash_flow_second_year,getWorkspaceCurrency($this->settings)) : '';
        $data['project_cumulative_free_cash_flow']['third_year'] = $project_cumulative_free_cash_flow_third_year !== '' ? formatCurrency($project_cumulative_free_cash_flow_third_year,getWorkspaceCurrency($this->settings)) : '';

        if($project_cumulative_free_cash_flow_first_year < 0){
            $data['capital_recovery_period']['first_year'] = 1;
        }
        if($project_cumulative_free_cash_flow_second_year < 0){
            $data['capital_recovery_period']['second_year'] = 1;
        }else{
            $data['capital_recovery_period']['second_year']  = ceil(abs($project_cumulative_free_cash_flow_first_year) / $data['calc_total']['second_year_net_cash_flow_number']) / 10;
        }
        // dd($data);
        
        return view('myPlane.index', $data);
    }



    public function investshow(){
        // $projects = Projects::latest()->get()->take(3);
        // return view('myPlane.investshow',compact('projects'));
        return view('myPlane.investshow');
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
