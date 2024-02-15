<?php
// OpportunityController.php

namespace App\Http\Controllers;

use App\Models\FoundRound;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OpportunityController extends Controller
{
    public function index(Request $request)
    {
        $opportunities = FoundRound::
        when($request->from, function ($q) use ($request) {
            $q->where('round_amount', '>=' ,$request->from);
        })
        ->when($request->to, function ($q) use ($request) {
            $q->where('round_amount', '<=' ,$request->to);
        })->latest()->get();
        
        $favorite_rounds = Auth::guard('investor')->user()->favoriteRounds->pluck('id')->toArray();
        
        return view('investor.opportunities.index', compact('opportunities', 'favorite_rounds'));
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
}
