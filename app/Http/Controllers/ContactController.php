<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\Projects;
use App\Models\Workspace;
use Illuminate\Http\Request;
use App\Imports\InvestorsImport;
use App\Models\ImportedInvestor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ContactController extends BaseController
{
    //

    public function addInvestor(Request $request)
    {

        if ($this->modules && !in_array("investors", $this->modules)) {
        abort(401);
    }
        $investor = false;

        if ($request->id) {
            $investor = Investor::find($request->id);
        }

        $products = Projects::where("workspace_id", $this->user->workspace_id)
            ->get()
            ->keyBy("id")
            ->all();

        $selected_navigation = 'invested_capital_planning';
        return \view("investors.add", [
            "selected_navigation" => "investors",
            "investor" =>  $investor,
            "products" =>  $products,
            "selected_navigation" => $selected_navigation
        ]);
    }

    public function investorList()
    {
        // dd(Auth::guard('investor')->user());
        if ($this->modules && !in_array("investors", $this->modules)) {
            abort(401);
        }
        $investors = Investor::where("workspace_id", $this->user->workspace_id)->get();

        $workspace = Workspace::find($this->user->workspace_id);

        $fixedSum = DB::table('fixed_invested_capitals')
            ->select('investing_price')
            ->where(['workspace_id' => $this->user->workspace_id])->sum('investing_price');
        $workingSum = DB::table('working_invested_capitals')
            ->select('investing_annual_cost')
            ->where(['workspace_id' => $this->user->workspace_id])->sum('investing_annual_cost');

        return \view("investors.list", [
            "selected_navigation" => "invested_capital_planning",
            "investors" =>  $investors,
            'workspace' => $workspace,
            "investingSum" =>  ($fixedSum + $workingSum),

        ]);
    }

    public function show(){
        $investors = Investor::where("workspace_id", $this->user->workspace_id)->get();
        $selected_navigation = "invested_capital_planning";
        $data = [];
        foreach ($investors as $item){
            $data[] = ['y' => $item->amount, 'label' => $item->first_name . ' ' . $item->last_name . " : ".  __('Ryal_in_english'). "$item->amount"];
        }

        return view('investors.show', compact('data', 'selected_navigation'));
    }


    public function investorPost(Request $request)
    {
        if ($this->modules && !in_array("investors", $this->modules)) {
            abort(401);
        }

        $request->validate([
            "first_name" => "required|string|max:100",
            "last_name" => "required|string|max:100",

            "email" => "required|email|unique:investors,email",
            "phone_number" => "nullable|string|max:50|unique:investors,phone_number",
            "amount" => "nullable|gt:0",
            "id" => "nullable|integer",
        ] , [
            "first_name.required" => 'الحقل الاسم الأول مطلوب.',
            "last_name.required" => 'الحقل الأخير الأول مطلوب.',
            "email.required" => 'الحقل اسم المستخدم / البريد الالكترونى مطلوب.'
        ]);


        $inventorsSum = DB::table('investors')
            ->select('amount')
            ->where(['workspace_id' => $this->user->workspace_id])->sum('amount');
        $investmentSum = Investor::getTotalInvestment($this->user->workspace_id);

        if (($inventorsSum+$request->amount) > $investmentSum){
            return redirect()->back()->with('errors', ['المبلغ المقدر للاستثمار لكل المستثمرين يجب الا يتعدى اجمالي راس مال المستثمر']);
        }

        $investor = false;

        if ($request->id) {

            $investor = Investor::where("workspace_id", $this->user->workspace_id)
                    ->where("id", $request->id)
                    ->first();
            }

            if($investor)
            {
                if( $investor->email !== $request->email)
                {
                    $exist = Investor::where('email',$request->email)->first();
                    if($exist)
                    {
                        return redirect()->back()->with([
                            'errors' => [
                                'user_exist' => __('Investor already exist with this email id.')
                            ]
                        ]);
                    }
                }
            }


        if (! $investor) {
            $investor = new Investor();
            $investor->workspace_id = $this->user->workspace_id;
        }

        $investor->first_name = $request->first_name;
        $investor->last_name = $request->last_name;
        $investor->email = $request->email;
        $investor->amount = $request->amount;
        $investor->source = $request->source;
        $investor->notes = clean($request->notes);
        $investor->phone_number = $request->phone_number;
        $investor->twitter = $request->twitter;
        $investor->product_id = $request->product_id;
        $investor->status = $request->status;

        $investor->facebook = $request->facebook;
        $investor->linkedin = $request->linkedin;
        $investor->companies_count = $request->companies_count?? 0;
        $investor->invest_from = $request->invest_from?? 0;
        $investor->invest_to = $request->invest_to?? 0;
//        $user->address_1 = $request->address_1;
//        $user->address_2 = $request->address_2;
//        $user->city = $request->city;
//        $user->state = $request->state;
//        $user->country = $request->country;

//        $user->zip = $request->zip;
        $investor->save();


        return redirect("/investors");
    }


    public function investorView(Request $request)
    {
        if ($this->modules && !in_array("investors", $this->modules)) {
            abort(401);
        }

        $investor = false;

        if ($request->id) {
            $investor = Investor::where(
                "workspace_id",
                $this->user->workspace_id
            )
                ->where("id", $request->id)
                ->first();
        }

        $products = Projects::where("workspace_id", $this->user->workspace_id)
            ->get()
            ->keyBy("id")
            ->all();



            $selected_navigation = 'invested_capital_planning';

        return \view("investors.view", [
            "selected_navigation" => "investors",
            "investor" => $investor,
            "products" => $products,
            "selected_navigation" => $selected_navigation


        ]);
    }



    public function investorSearch(){
        if ($this->modules && !in_array("investors", $this->modules)) {
            abort(401);
        }
        $investors = ImportedInvestor::all();

        // $workspace = Workspace::find($this->user->workspace_id);

        // $fixedSum = DB::table('fixed_invested_capitals')
        //     ->select('investing_price')
        //     ->where(['workspace_id' => $this->user->workspace_id])->sum('investing_price');
        // $workingSum = DB::table('working_invested_capitals')
        //     ->select('investing_annual_cost')
        //     ->where(['workspace_id' => $this->user->workspace_id])->sum('investing_annual_cost');
        
        $amounts = ImportedInvestor::distinct()->pluck('number_of_investment')->toArray();
        $number_of_exits = ImportedInvestor::distinct()->pluck('number_of_exits')->toArray();
        $investor_types = ImportedInvestor::distinct()->pluck('investor_type')->toArray();
        $investor_stages = ImportedInvestor::distinct()->pluck('investor_stage')->toArray();
        $cities = ImportedInvestor::distinct()->pluck('location')->toArray();
        return \view("investors.investors-search", [
            "selected_navigation" => "investorSearch",
            "number_of_exits" =>  $number_of_exits,
            "investor_types" =>  $investor_types,
            "investor_stages" =>  $investor_stages,
            "investors" =>  $investors,
            "amounts" =>  $amounts,
            "cities" =>  $cities,

        ]);
    }

    public function investorImport(){
        if ($this->modules && !in_array("investors", $this->modules)) {
            abort(401);
        }
        
        return \view("investors.investors-import", [
            "selected_navigation" => "investorImoprt",
        ]);
    }

    public function import(Request $request){
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        // try {
            $filePath = $request->file('file')->getRealPath();

            $investors = Excel::toCollection(new InvestorsImport, $filePath);
            if ($investors && $investors->count()) {
                $investors = $investors->first();
                DB::beginTransaction();
                foreach ($investors as $investor) {
                    if ($investor[0] == 'Name') {
                        continue;
                    }

                    $existingInvestor = ImportedInvestor::where('name', $investor[0])->first();
                    if ($existingInvestor) {
                        continue;
                    }
                    ImportedInvestor::create([
                        'name' => $investor[0],
                        'number_of_investment' => $investor[1] ?? '',
                        'number_of_exits' => $investor[2] ?? '',
                        'location' => $investor[3] ?? '',
                        'monthly_visits' => $investor[4] ?? '',
                        'investor_type' => $investor[5] ?? '',
                        'investor_stage' => $investor[6] ?? '',
                    ]);
                }

                DB::commit();

                return redirect()->route('investors.search')->with('success', 'Data imported successfully');
            }

            return redirect()->back()->with('error', 'No data found in the file');

        // } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        // }
    }

    public function investorFavorite(){
            // dd(Auth::guard('investor')->user());
        if ($this->modules && !in_array("investors", $this->modules)) {
            abort(401);
        }
        $investors = ImportedInvestor::where('favorited',1)->get();

        return \view("investors.investors-favorite", [
            "selected_navigation" => "investorFavorite",
            "investors" =>  $investors,
        ]);
    } 

    public function investorFilter(Request $request){

        // dd($request);
        $query = $request->input('query');
        $amount = $request->input('amount');
        $ExitNumber = $request->input('ExitNumber');
        $InvestorType = $request->input('InvestorType');
        $InvestPhase = $request->input('InvestPhase');
        $city = $request->input('city');

        // Start with base query
        $queryBuilder = ImportedInvestor::query();

        // Apply search query
        if ($query) {
            $queryBuilder->where('name', 'like', '%' . $query . '%');
        }

        // Apply amount filter
        if ($amount) {
            $queryBuilder->where('number_of_investment', $amount);
        }

        // Apply city filter
        if ($city) {
            $queryBuilder->where('location', $city);
        }

        // Apply city filter
        if ($ExitNumber) {
            $queryBuilder->where('number_of_exits', $ExitNumber);
        }

        // Apply city filter
        if ($InvestorType) {
            $queryBuilder->where('investor_type', $InvestorType);
        }

        // Apply city filter
        if ($InvestPhase) {
            $queryBuilder->where('investor_stage', $InvestPhase);
        }

        // Get filtered investors
        $investors = $queryBuilder->get();

        // Return JSON response with filtered investors
        return response()->json([
            'investors' => $investors
        ]);
    }

    public function addToFavorite(Request $request, $investorId)
    {
        $investor = ImportedInvestor::find($investorId);
        if (!$investor) {
            return response()->json(['message' => 'Investor not found'], 404);
        }
        if($investor->favorited == 1){
            $investor->favorited=0;
            $investor->save();
        }else{
            $investor->favorited=1;
            $investor->save();
        }
        return response()->json(['investorId' => $investorId,'favorited' => $investor->favorited]);
    } 
}
