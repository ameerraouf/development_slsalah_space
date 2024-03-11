<?php

namespace App\Http\Controllers;

use App\Models\InvestorChat;
use App\Models\User;
use Illuminate\Http\Request;

class InvestorAdminChatController extends Controller
{


    public function index() {

        $user = User::where('super_admin',1)->first();
        $messages = InvestorChat::where('user_id', $user->id)->where('investor_id', auth('investor')->user()->id)->orderBy('id', 'asc')->get();


        return view('investor.chats-admin.index', compact('user','messages'));

    }


    public function broadcast(Request $request) {

        $run = InvestorAdminChat::create([
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
