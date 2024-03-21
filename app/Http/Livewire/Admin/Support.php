<?php

namespace App\Http\Livewire\Admin;

use App\Models\Investor;
use App\Models\SupportChat;
use Livewire\Component;

class Support extends Component
{


    public $chats;

    private $model;

    public $messages;

    public $message_text;

    public $user;

    protected $preview;


    public function __construct()
    {
        
        // Set Admin Property

        // Set Model Property
        $this->model = new SupportChat();

        // Set Chats
        $chats = $this->model->investorsChats();

        $this->chats = $chats;

    }


    public function openChat($sender_id) {

        $this->user = Investor::find($sender_id);

        $messages = $this->model->where('sender_id', $sender_id)->orderBy('id', 'asc')->get();

        $this->messages = $messages;


    }

    public function render()
    {
        return view('livewire.admin.support-chat');
    }
}
