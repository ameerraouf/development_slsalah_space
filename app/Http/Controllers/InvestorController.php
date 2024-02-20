<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Investor;
use App\Models\FoundRound;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    public function index()
    {
        $rounds = FoundRound::latest()->take(5)->get();

        return view('investor.index', compact('rounds'));
    }
    public function news()
    {
        return view('investor.news.index');
    }

    public function profile()
    {
        $user = Auth::guard('investor')->user();
        $available_languages = User::$available_languages;
        return view("investor.profile.profile" ,compact('user','available_languages'));
    }

    public function profileUpdate($id)
    {
        dd($id);
        return view("investor.profile.profile" ,compact('user','available_languages'));
    }

}
