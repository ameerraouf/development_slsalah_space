<?php

namespace App\Http\Livewire\Admin;

use App\Models\User as ModelsUser;
use App\Models\UserAdminChat;
use Livewire\Component;

class User extends Component
{
    private $model;

    public $messages = [];

    public $message_text;

    public $user;

    protected $preview;

    public $admin;

    public function __construct()
    {
        

        //Set Admin
        $this->admin = ModelsUser::where('super_admin', '1')->first();

        // Set Model Property
        $this->model = new UserAdminChat();

        // Set Messages 

        $this->messages = $this->model->where('user_id', auth()->user()->id)->get();

    }


    public function render()
    {
        return view('livewire.admin.user');
    }
}
