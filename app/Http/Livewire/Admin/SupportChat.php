<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class SupportChat extends Component
{


    public $chats;

    private $model;

    public $messages;

    public $message_text;

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

    }

    public function render()
    {
        return view('livewire.admin.support-chat');
    }
}
