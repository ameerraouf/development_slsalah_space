<?php
// OpportunityController.php

namespace App\Http\Controllers;

use App\Models\Opportunity;
use App\Models\{User , Workspace};
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        $opportunities = User::with('workspace_planes')->where("account_type",'1')->OrWhere("account_type",'2')->get();
        $opportunities_Fillter = User::whereNotNull(["work_field", "account_type"])->get();
        return view('investor.opportunities.index', compact('opportunities' ,'opportunities_Fillter'));
    }

    public function create()
    {
        return view('opportunities.create');
    }

    public function store(Request $request)
    {
        // Add validation as per your requirements

        Opportunity::create($request->all());

        return redirect()->route('opportunities.index')->with('success', 'Opportunity created successfully');
    }

    public function show(Opportunity $opportunity)
    {
        return view('opportunities.show', compact('opportunity'));
    }

    public function edit(Opportunity $opportunity)
    {
        return view('opportunities.edit', compact('opportunity'));
    }

    public function update(Request $request, Opportunity $opportunity)
    {
        // Add validation as per your requirements

        $opportunity->update($request->all());

        return redirect()->route('opportunities.index')->with('success', 'Opportunity updated successfully');
    }

    public function destroy(Opportunity $opportunity)
    {
        $opportunity->delete();

        return redirect()->route('opportunities.index')->with('success', 'Opportunity deleted successfully');
    }


    public function fillter_opportunities(Request $request)
    { 
         $opportunities = User::with('workspace_planes')
                ->whereHas('workspace_planes', function ($query) use ($request) {
                    $query->where('price', $request->price);
                })
                ->orWhere('work_field', $request->work_field)
                ->whereNotNull('account_type')
                ->get();
        $opportunities_Fillter = User::whereNotNull(["work_field", "account_type"])->get();
        return view('investor.opportunities.index')->with('opportunities' , $opportunities)->with('opportunities_Fillter' , $opportunities_Fillter);
    }


}
