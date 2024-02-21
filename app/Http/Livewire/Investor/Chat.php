<?php

namespace App\Http\Livewire\Investor;

use App\Models\InvestorChat;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Chat extends Component
{
    use WithPagination;


    public $chats;

    public $search;

    public $pioneers;

    private $model;

    public $user;

    public $messages;

    public $message_text;

    protected $preview;

    public function __construct()
    {
        $this->model = new InvestorChat;

        $this->chats = $this->model->usersChats();
        
        $this->pioneers = User::all();

    }


    public function openChat(string $user_id) {

        $user = User::find($user_id);

        $messages = $this->model->where('user_id', $user_id)->where('investor_id', auth('investor')->user()->id)->orderBy('id', 'asc')->get();
        
        $this->chats = $this->model->usersChats();

        $this->user = $user;

        $this->messages = $messages;
        

        $this->emit('$refresh');

        
    }

    // public function SendMessage(string $user_id) {

    //     $run = $this->model->create([
    //         "chat_id"       => 1,
    //         "user_id"       => $user_id,
    //         "investor_id"   => auth('investor')->user()->id,
    //         "message"       => $this->message_text,
    //         "sended_by"     => "investor"
    //     ]);

    //     $this->message_text = "";

    //     broadcast(new ChatSent(auth('investor')->user(), $this->message_text));

    //     $this->emit('$refresh');
    //     $this->openChat($user_id);


    // }

    public function render()
    {
        return view('livewire.investor.chat.index');
    }
}
