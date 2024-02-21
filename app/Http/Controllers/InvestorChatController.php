<?php

namespace App\Http\Controllers;

use App\Events\ChatSent;
use App\Models\Investor;
use App\Models\InvestorChat;
use App\Models\User;
use Illuminate\Http\Request;
use Pusher\Pusher;

class InvestorChatController extends Controller
{


    public function index() {

        $pioneers = User::all();


        return view('investor.chats.index', compact('pioneers'));

    }


    public function broadcast(Request $request) {

        $run = InvestorChat::create([
            "user_id"       => $request->user_id,
            "chat_id"       => 1,

            "investor_id"   => auth('investor')->user()->id,
            "message"       => $request->message,
            "sended_by"     => "investor"
        ]);


        broadcast(new ChatSent($request->user_id, 'investor' ,$request->get('message')))->toOthers();

        return view('investor.chats.components.broadcast', ['message' => $request->get('message')]);

    }

    public function recive(Request $request) {

        return view('investor.chats.components.recive', ['message' => $request->get('message')]);

    }

}
