<?php

namespace App\Http\Controllers;

use App\Models\{User , Workspace , Subscribe};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestorController extends Controller
{
    public function index()
    {
        $workspaces = User::with('workspace_planes')->where("account_type",'1')->OrWhere("account_type",'2')->paginate(5);
        $workspacess = user::get();
        $workspacesss = Subscribe::where('is_active' , '1')->sum('price');
        return view('investor.index' , compact('workspaces' , 'workspacess' ,'workspacesss'));
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

}
