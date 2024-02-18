<?php

namespace App\Http\Controllers;

use App\Models\Investor;
use App\Models\InvestorChat;
use Illuminate\Http\Request;
use Pusher\Pusher;

class InvestorChatController extends Controller
{


    public function index() {

        $chats = InvestorChat::query()
        ->where('is_open', false)
        ->where('sender_id', auth('investor')->id())
        ->get()
        ->unique('chat_id');

    $chatClosed = false;

    $currentChat = InvestorChat::query()
        ->where('sender_id', auth('investor')->id())
        ->where('is_open', 1)
        ->latest()
        ->first();

    $pusher = new Pusher(
        config('broadcasting.connections.pusher.key'),
        config('broadcasting.connections.pusher.secret'),
        config('broadcasting.connections.pusher.app_id'),
        config('broadcasting.connections.pusher.options')
    );

    $unreadMessages = InvestorChat::query()
        ->where('investor_id', auth('investor')->id())
        ->whereNull('user_read_at')
        ->get();

    foreach ($unreadMessages as $message) {
        $message->update(['user_read_at' => now()]);
    }

    $pusher->trigger('user-count-chat', 'user-count-chat', ['count' => 0]);

    if ($currentChat) {
        if($currentChat->is_open == 1){
            $messages = InvestorChat::query()
                ->where('chat_id', $currentChat->chat_id)
                ->get();

            if($messages->first()->is_open == 0){
                $chatClosed = true;
            }
        }
    } else {
        $messages = [];
    }



    $user = Investor::query()->find(\auth('investor')->id());

    if(isset( $user->photo)){
        $userPhoto = url('uploads/' .  $user->photo);
    }else{
        $userPhoto = url('/'. env('DEFAULT_PHOTO')??"");
    }
    return view('chat.index', compact('chats','currentChat', 'chatClosed' , 'messages', 'adminPhoto', 'userPhoto', 'user'));

    }

}
