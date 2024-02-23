<?php

namespace App\Http\Controllers;

use App\Models\FoundRound;
use Illuminate\Http\Request;
use App\Models\FavoriteRounds;
use Illuminate\Support\Facades\Auth;

class FavoriteCompaniesController extends Controller
{
    public function index(Request $request)
    {
        $opportunities = FoundRound::where(function ($query) use ($request) {
            if ($request->from) {
                $query->where('round_amount', '>=', $request->from);
            }
            
            if ($request->to) {
                $query->where('round_amount', '<=', $request->to);
            }
        })
        ->when(Auth::guard('investor')->check(), function ($query) {
            $query->whereIn('id', Auth::guard('investor')->user()->favoriteRounds->pluck('id'));
        })
        ->latest()
        ->get();
        
        $favorite_rounds = Auth::guard('investor')->user()->favoriteRounds->pluck('id')->toArray();
        return view('investor.favorite-companies.index', compact('opportunities', 'favorite_rounds'));
    }
}
