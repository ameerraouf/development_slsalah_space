<?php

namespace App\Http\Controllers;

use App\Http\Requests\FoundRoundRequest;
use App\Models\FoundRound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoundRoundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $found_rounds = $user->foundRounds;
        $selected_navigation = 'foundRound';

        return view('found-round.index', compact('found_rounds', 'selected_navigation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selected_navigation = 'foundRound';

        return view('found-round.create', compact('selected_navigation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FoundRoundRequest $request)
    {
        $round = new FoundRound();
        $round->round_amount = $request->round_amount;
        $round->share_round = $request->share_round?1:0;
        $round->share_plan = $request->share_plan?1:0;
        $round->share_profile = $request->share_profile?1:0;
        $round->business_pioneer_id = Auth::user()->id;

        $round->save();
        return redirect()->route('pioneer.pioneer-found-rounds')->with('success', 'تم حفظ البيانات بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FoundRound  $foundRound
     * @return \Illuminate\Http\Response
     */
    public function show(FoundRound $foundRound)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FoundRound  $foundRound
     * @return \Illuminate\Http\Response
     */
    public function edit(FoundRound $round)
    {

        return view('found-round.edit', compact('round'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FoundRound  $foundRound
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FoundRound $round)
    {
        if($request->round_amount > 9999999999.00){
            return redirect()->route('pioneer.pioneer-found-rounds')->with('error', 'حجم التمويل المطلوب لا يتجاوز 9999999999');
        }
        $round->round_amount = $request->round_amount;
        $round->share_round = $request->share_round?1:0;
        $round->share_plan = $request->share_plan?1:0;
        $round->share_profile = $request->share_profile?1:0;
        $round->business_pioneer_id = Auth::user()->id;
        $round->save();
        return redirect()->route('pioneer.pioneer-found-rounds')->with('success', 'تم تعديل الجولة بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FoundRound  $round
     * @return \Illuminate\Http\Response
     */
    public function destroy(FoundRound $round)
    {
        $round->delete();
        return  redirect()->route('pioneer.pioneer-found-rounds')->with('success', 'تم حذف الجولة بنجاح');
    }
}
