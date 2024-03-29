<?php

namespace App\Http\Controllers;

use App\Events\ChatSent;
use App\Models\Chat;
use App\Models\Investor;
use App\Models\InvestorChat;
use App\Models\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Pusher\Pusher;

class UserChatController extends BaseController
{
    public $userPhoto;
    public $adminPhoto;
    public function __construct()
    {

        $this->adminPhoto = User::query()->where('super_admin', 1)->first()->photo;
        if($this->adminPhoto) {
            $this->adminPhoto = url('uploads/'. $this->adminPhoto);
        }else{
            $this->adminPhoto = url('/'. env('DEFAULT_PHOTO')??"");
        }

        $user = User::query()->find(\auth()->id());

        if(isset( $user->photo)){
            $this->userPhoto = url('uploads/' .  $user->photo);
        }else{
            $this->userPhoto = url('/'. env('DEFAULT_PHOTO')??"");
        }

    }

    public function index()
    {
        return view('pioneers.chats.index');
    }

    public function broadcast(Request $request) {

        $run = InvestorChat::create([
            "user_id"       => auth()->user()->id,
            "chat_id"       => 1,
            "investor_id"   => $request->investor_id,
            "message"       => $request->message,
            "sended_by"     => "user"
        ]);

        broadcast(new ChatSent($request->investor_id, 'user', $run, auth()->user()->id))->toOthers();

        return view('investor.chats.components.broadcast', ['message' => $run]);

    }

    public function recive(Request $request) {

        return view('investor.chats.components.recive', ['message' => $request->get('message')]);

    }
    public function getCountPioneer(Request $request) {
        $investor_id = $request->investor_id;
        $count = InvestorChat::where('sended_by', 'investor')->where('investor_id', $investor_id)->where('is_open', '0')->count();
        return $count;
    }
    public function send(Request $request)
    {
        $date = Carbon::now();
        $date->setTimezone('Africa/Cairo');

        $pusher = new Pusher(
            config('broadcasting.connections.pusher.key'),
            config('broadcasting.connections.pusher.secret'),
            config('broadcasting.connections.pusher.app_id'),
            config('broadcasting.connections.pusher.options')
        );


        $pusher->trigger('user-count-chat', 'user-count-chat', ['count' => 0]);

        $admin = User::query()->where('super_admin' , 1)->first();

        $filePath = '';
        if($request->has('file') && $request->input('file') != "undefined") {
            $file = $request->file('file');

            $filePath = $file->store("media", "uploads");
        }
        $audioPath ='';

        if($request->has('audio') && $request->input('audio') !="undefined" ) {
            $file = $request->file('audio');
            $audioPath = $file->store("media", "uploads");
        }

        $oldChat = Chat::query()->where('is_open', true)
            ->where('sender_id', auth()->id())
            ->latest()
            ->first();

//        if(!empty($request->input('message') )&& !empty($filePath) && !empty($audioPath))){
//
//        }
        if($oldChat){
            if($oldChat->is_open == 1){

                $chat = Chat::query()->create([
                    'is_open' => 1,
                    'chat_id' => $oldChat->chat_id,
                    'message' => $request->input('message'),
                    'user_read_at' => now(),
                    'file' => $filePath??null,
                    'audio' => $audioPath??null,
                    'sender_id' => auth()->id(),
                    'receiver_id' => $admin->id,
                ]);

                $updateMessages = Chat::query()->where('chat_id', $oldChat->chat_id)->get();

                foreach ($updateMessages as $updateMessage) {
                    $updateMessage->update(['user_read_at' => now()]);
                }

                $user = User::query()->find(\auth()->id());

                if(isset( $user->photo)){
                    $userPhoto = url('uploads/' .  $user->photo);
                }else{
                    $userPhoto = url('/'. env('DEFAULT_PHOTO')??"");
                }

                $pusher->trigger('chat-channel', 'new-message', ['chat' => $chat, 'userPhoto' => $userPhoto]);

                $messagesCount = Chat::query()
                    ->where('receiver_id' ,1)
                    ->where('admin_read_at', null)->count();

                $pusher->trigger('count-chat', 'count-chat', ['count' => $messagesCount]);

                return response()->json(['data' => $chat, 'userPhoto' => $userPhoto]);
            }
            return  response()->json(['data' => 'تم انهاء الشات من قبل الادمن']);

        }else{
            $chat = Chat::query()->create([
                'is_open' => 1,
                'message' => $request->input('message'),
                'user_read_at' => now(),
                'file' => $filePath??null,
                'sender_id' => auth()->id(),
                'receiver_id' => $admin->id,
                'audio' => $audioPath??null,
            ]);
            $chat->chat_id = $chat->id;
            $chat->save();

            $user = User::query()->find(\auth()->id());

            if(isset( $user->photo)){
                $userPhoto = url('uploads/' .  $user->photo);
            }else{
                $userPhoto = url('/'. env('DEFAULT_PHOTO')??"");
            }

            $pusher->trigger('reload-page-admin', 'reload-page-admin', ['message' => 'disabled']);
            $pusher->trigger('chat-channel', 'new-message', ['chat' => $chat, 'userPhoto' => $userPhoto]);

            $messagesCount = Chat::query()
                ->where('receiver_id' ,1)
                ->where('admin_read_at', null)
                ->count();


            $pusher->trigger('count-chat', 'count-chat', ['count' => $messagesCount]);

            return response()->json(['data' => $chat, 'userPhoto' => $userPhoto]);
        }
    }
}
