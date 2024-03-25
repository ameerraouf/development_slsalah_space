<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\UserAdminChat;
use Livewire\Component;

class Admin extends Component
{


    public $chats;

    private $model;

    public $messages;

    public $message_text;

    public $user;

    protected $preview;


    public function __construct()
    {
        

        // Set Model Property
        $this->model = new UserAdminChat();

        // Set Chats
        $chats = $this->model->usersChats();

        $this->chats = $chats;

    }


    public function openChat($sender_id) {

        $this->user = User::find($sender_id);

        $messages = $this->model->where('user_id', $sender_id)->orderBy('id', 'asc')->get();

        $this->messages = $messages;


    }

    public function render()
    {
        return view('livewire.admin.admin');
    }
}
