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
        // $user = Auth::guard('investor')->user();
        $user = Auth::user();
        $available_languages = User::$available_languages;
        return view("investor.profile.profile" ,compact('user','available_languages'));
    }

    public function profileUpdate($id,Request $request)
    {
        // $user = Investor::find($id);
        // {
        //     $request->validate([
        //         "first_name" => "required|string|max:100",
        //         "last_name" => "required|string|max:100",
        //         "email" => "required|email",
        //         "phone_number" => "nullable|string|max:50",
        //         "amount" => "nullable|gt:0",
        //         "id" => "nullable|integer",
        //     ] , [
        //         "first_name.required" => 'الحقل الاسم الأول مطلوب.',
        //         "last_name.required" => 'الحقل الأخير الأول مطلوب.',
        //         "email.required" => 'الحقل اسم المستخدم / البريد الالكترونى مطلوب.'
        //     ]);
    
    
        //     if ($user->email !== $request->email) {
        //         $exist = Investor::where('email', $request->email)->first();
        //         if ($exist) {
        //             return redirect()->back()->with('error', 'البريد الالكتروني مسجل بالفعل');
        //         }
        //     }
    
        //     if ($user->phone_number !== $request->phone_number) {
        //         $exist = Investor::where('phone_number', $request->phone_number)->first();
        //         if ($exist) {
        //             return redirect()->back()->with('error', 'رقم الهاتف مسجل بالفعل');
        //         }
        //     }
            
        //     $user->first_name = $request->first_name;
        //     $user->last_name = $request->last_name;
        //     $user->email = $request->email;
        //     $user->phone_number = $request->phone_number ?? '';
        //     $user->update();

        // }
        return view("investor.profile.profile" ,compact('user'))->with('success', 'تم تعديل البيانات بنجاح');
    }

}
