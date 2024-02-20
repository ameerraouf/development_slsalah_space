<?php

namespace App\Http\Controllers;

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

}
