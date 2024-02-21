<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Mail\PasswordReset;
use App\Mail\WelcomeEmail;
use App\Models\Investor;
use App\Models\Setting;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\View;
use function Symfony\Component\Translation\t;

class AuthController extends Controller
{
    //
    protected $settings;
    protected $super_settings;

    public function __construct()
    {
        parent::__construct();

        $this->middleware(function ($request, $next) {
            $super_settings = [];

            $super_settings_data = Setting::where('workspace_id', 1)->get();
            foreach ($super_settings_data as $super_setting) {
                $super_settings[$super_setting->key] = $super_setting->value;
            }

            $this->super_settings = $super_settings;
            $language = $super_settings['language'] ?? 'en';
            \App::setLocale($language);
            View::share("super_settings", $super_settings);
            return $next($request);
        });

        $this->middleware('guest')->except('logout');
        $this->middleware('guest:investor')->except('logout');
    }

    public function login()
    {
        if (Auth::check()) {
            return redirect("/dashboard");
        }

        return \view("auth.login");
    }

    public function superAdminlogin()
    { 
        return \view("auth.super-admin-login");
    }

    public function passwordReset(Request $request)
    {
        $request->validate([
            "id" => "required|integer",
            "token" => "required|uuid",
        ]);

        $user = User::find($request->id);

        if (!$user) {
            return redirect("/")->withErrors([
                "key" => "Invalid user or link expired",
            ]);
        }

        if ($user->password_reset_key !== $request->token) {
            return redirect("/")->withErrors([
                "key" => "Invalid key",
            ]);
        }

        return \view("auth.reset-password", [
            "id" => $request->id,
            "password_reset_key" => $request->token,
        ]);
    }

    public function signup()
    {
        return \view("auth.signup");
    }

    public function forgotPassword()
    {
        return \view("auth.forgot-password");
    }

    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => "required|email",
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return redirect()
                ->back()
                ->withErrors([
                    "email" => "لا يوجد حساب مرتبط بالبريد الالكتروني هذا",
                ]);
        }

        $user->password_reset_key = Str::uuid();
        $user->save();

        if (!empty($this->super_settings['smtp_host'])) {
            try {
                Config::set('mail.mailers.smtp.host', $this->super_settings['smtp_host']);
                Config::set('mail.mailers.smtp.username', $this->super_settings['smtp_username']);
                Config::set('mail.mailers.smtp.password', $this->super_settings['smtp_password']);
                Config::set('mail.mailers.smtp.port', $this->super_settings['smtp_port']);
                Mail::to($user->email)->send(new PasswordReset($user));
            } catch (\Exception $e) {
                Log::error($e->getMessage());
            }
        }


        session()->flash(
            "status",
            "We sent you an email with the instruction to reset the password."
        );

        return redirect("/");
    }

    public function newPasswordPost(Request $request)
    {
        $request->validate([
            "password" => "required|confirmed",
            "id" => "required|integer",
            "password_reset_key" => "required|uuid",
        ]);

        $user = User::find($request->id);

        if (!$user) {
            return redirect()
                ->back()
                ->withErrors([
                    "email" => "No account found with this email",
                ]);
        }

        if ($user->password_reset_key !== $request->password_reset_key) {
            return redirect()
                ->back()
                ->withErrors([
                    "key" => "Invalid key",
                ]);
        }

        $user->password = Hash::make($request->password);

        $user->password_reset_key = null;

        $user->save();

        session()->flash(
            "status",
            "Your password has been reset, login with the new password."
        );

        return redirect("/");
    }

    public function superAdminPostLogin(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = false;

        if ($request->remember) {
            $remember = true;
        }

        if (Auth::attempt($credentials, $remember)) {
            $user = User::where('email', $request->email)->first();

            if ($user->super_admin) {
                return redirect()->route('login')->withErrors([
                    "email" => __("Invalid user."),
                ]);
            }

            return redirect()->intended('dashboard')->with('success', 'تم تسجيل الدخول بنجاح.');
        }else {
            return redirect()->route('login')->withErrors([
                "email" => __("Invalid user."),
            ]);
        }
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        //Verify recaptcha v2
        if (!empty($super_settings['config_recaptcha_in_user_login'])) {
            $recaptcha = $request->get('g-recaptcha-response');
            $secret = $this->super_settings['recaptcha_secret_key'] ?? '';

            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha}");
            $captcha_success = json_decode($verify);
            if ($captcha_success->success == false) {
                return redirect()->back()->withErrors([
                    'key' => 'Invalid captcha',
                ]);
            }
        }

        $remember = false;

        if ($request->remember) {
            $remember = true;
        }

        if (Auth::guard('investor')->attempt($credentials, $remember)) {


            return redirect()->intended(route('investor.index')); // Redirect to the intended page
        }else {
            return redirect()->route('login')->withErrors([
                "email" => __("Invalid user."),
            ]);
        }
    }

    public function signupPost(UserRequest $request)
    {

        if (!empty($super_settings['config_recaptcha_in_user_signup'])) {
            $recaptcha = $request->get('g-recaptcha-response');
            $secret = $this->super_settings['recaptcha_secret_key'] ?? '';

            $verify = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$recaptcha}");
            $captcha_success = json_decode($verify);
            if ($captcha_success->success == false) {
                return redirect()->back()->withErrors([
                    'key' => 'Invalid captcha',
                ]);
            }
        }

        $workspace = new Workspace();
        $workspace->name = $request->first_name . "'s workspace";
        $workspace->save();

        if($request->account_type === 'investor')
        {
            $user = new Investor();
        }else{
            $user = new User();
        }
 
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->password = Hash::make($request->password);
        $user->email = $request->email;
        $user->workspace_id = $workspace->id;
        if($request->account_type === 'business_pioneer')
        {
            $user->company_name = $request->company_name ?? null;
        }

        if($request->account_type === 'investor')
        {
            $user->companies_count = $request->company_count;
            $user->invest_from = $request->range_one ?? null;
            $user->invest_to = $request->range_two?? null;    
        }
        $user->save();

        $workspace->owner_id = $user->id;
        $workspace->save();

        // if (!empty($this->super_settings['smtp_host'])) {
        //     try {
        //         Config::set('mail.mailers.smtp.host', $this->super_settings['smtp_host']);
        //         Config::set('mail.mailers.smtp.username', $this->super_settings['smtp_username']);
        //         Config::set('mail.mailers.smtp.password', $this->super_settings['smtp_password']);
        //         Config::set('mail.mailers.smtp.port', $this->super_settings['smtp_port']);
        //         Mail::to($user)->send(new WelcomeEmail($user));
        //     } catch (\Exception $e) {
        //         Log::error($e->getMessage());
        //     }
        // }


        return redirect()->route('login')->with('success', 'تم تسجيل العضوية بنجاح');
    }

    public function logout(Request $request)
    {
        if(Auth::guard('investor')->check())
        {
            Auth::guard('investor')->logout();
            return redirect("/");
        }
    
        Auth::logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect("/");
    }
}
