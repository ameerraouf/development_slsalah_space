<?php

namespace App\Http\Controllers;

use App\Events\ChatSent;
use App\Models\Chat;
use App\Models\SupportChat;
use App\Models\User;
use Carbon\Carbon;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Pusher\Pusher;

class AdminChatController extends SuperAdminController
{
    public function broadcast(Request $request) {

        $chatId     = Str::uuid();

        $sender_id  = auth('investor')->user()->id ?? auth()->user()->id;

        $type       = auth('investor')->user()->id ? 'investor' : 'user';

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
}
