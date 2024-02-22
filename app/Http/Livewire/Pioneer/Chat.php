<?php

namespace App\Http\Livewire\Pioneer;

use App\Events\ChatSent;
use App\Models\Investor;
use App\Models\InvestorChat;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Chat extends Component
{
    use WithPagination;


    public $chats;

    public $search;

    private $model;

    public $investor;

    
    public $messages;

    public $message_text;

    protected $preview;

    public function __construct()
    {
        $this->model = new InvestorChat;

        $this->chats = $this->model->investorsChats();
        

    }


    public function openChat(string $investor_id) {

        $investor = Investor::find($investor_id);

        $messages = $this->model->where('user_id', auth()->user()->id)->where('investor_id', $investor_id)->orderBy('id', 'asc')->get();
        
        $this->chats = $this->model->investorsChats();

        $this->investor = $investor;

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
        return view('livewire.pioneers.chat.index');
    }
}
