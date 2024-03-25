<?php

namespace App\Http\Controllers;

use App\Events\ChatSent;
use App\Models\Setting;
use App\Models\User;
use App\Models\UserAdminChat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class UserAdminController extends Controller
{
    
    public function userView() {

        $super_settings = [];
        $super_settings = [];

        $super_settings_data = Setting::where('workspace_id', 1)->get();
        foreach ($super_settings_data as $super_setting) {
            $super_settings[$super_setting->key] = $super_setting->value;
        }

        $language = $super_settings['language'] ?? 'en';

        App::setLocale($language);
        return view('user-chat-admin.user.index', compact('super_settings'));


    }

    public function broadcastUser(Request $request) {

        $admin = User::where('super_admin', '1')->first();

        $run = UserAdminChat::create([
            'admin_id' => $admin->id,
            'user_id'  => auth()->user()->id,
            'message'  => $request->message,
            'sender_type' => 'user'
        ]);

        broadcast(new ChatSent($request->reciver, 'user', $run))->toOthers();


        return view('user-chat-admin.user.broadcast', ['message' => $run]);
    }

    public function reciveUser(Request $request) {

        return view('user-chat-admin.user.recive', ['message' => $request->get('message')]);

    }

    public function adminView() {
        
        // check Permission

        if (auth()->user()->super_admin != '1') {

            return redirect('/');

        }

        $super_settings = [];
        $super_settings = [];

        $super_settings_data = Setting::where('workspace_id', 1)->get();
        foreach ($super_settings_data as $super_setting) {
            $super_settings[$super_setting->key] = $super_setting->value;
        }

        $language = $super_settings['language'] ?? 'en';

        App::setLocale($language);
        return view('user-chat-admin.admin.index', compact('super_settings'));
    }

    public function broadcastAdmin(Request $request) {

        $admin = User::where('super_admin', '1')->first();

        $run = UserAdminChat::create([
            'admin_id' => $admin->id,
            'user_id'  => $request->user_id,
            'message'  => $request->message,
            'sender_type' => 'admin'
        ]);

        broadcast(new ChatSent($request->reciver, 'user', $run))->toOthers();


        return view('user-chat-admin.admin.broadcast', ['message' => $run]);
    }

    public function reciveAdmin(Request $request) {

        return view('user-chat-admin.admin.recive', ['message' => $request->get('message')]);

    }
}
