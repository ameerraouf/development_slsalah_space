<?php

namespace App\Http\Controllers;

use App\Events\ChatSent;
use App\Models\Chat;
use App\Models\Setting;
use App\Models\SupportChat;
use App\Models\User;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Pusher\Pusher;

class AdminChatController extends Controller
{
    public function broadcast(Request $request) {

        $chatId     = Str::uuid();

        $sender_id  = auth('investor')->user()->id ?? auth()->user()->id;

        $type       = auth('investor')->user()->id ? 'investor' : 'user';

        // Check If Isset File

        $run = SupportChat::create([
            'chat_id'       => $chatId,
            'sender_id'     => $sender_id,
            'reciver_id'    => $request->reciver,
            'message'       => $request->message,
            'sender_type'   => $type
        ]);


        broadcast(new ChatSent($request->reciver, 'investor', $run))->toOthers();

        
        return view('investor.chats.components.broadcast', ['message' => $run]);


    }


    public function recive(Request $request) {

        return view('investor.chats.components.recive', ['message' => $request->get('message')]);

    }

    public function index() {

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
        return view('support-chats.index', compact('super_settings'));

    }

    public function broadcastInAdmin(Request $request) {

        $chatId     = Str::uuid();

        $sender_id  = $request->sender;

        $reciver = User::where('super_admin', 1)->first();


        $run = SupportChat::create([
            'chat_id'       => $chatId,
            'sender_id'     => $sender_id, // investor id 
            'reciver_id'    => $reciver->id, // admin id done
            'message'       => $request->message,
            'sender_type'   => 'user'
        ]);


        broadcast(new ChatSent($request->reciver, 'investor', $run))->toOthers();

        
        return view('investor.chats.components.broadcast', ['message' => $run]);

    }

    public function reciveInAdmin(Request $request) {
        return view('investor.chats.components.recive', ['message' => $request->get('message')]);
    }
}
