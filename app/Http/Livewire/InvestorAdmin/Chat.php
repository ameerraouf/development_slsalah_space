<?php

namespace App\Http\Livewire\InvestorAdmin;

use App\Models\InvestorChat;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Chat extends Component
{
    use WithPagination;


    public $chats;

    public $search;

    public $admins;

    private $model;

    public $user;

    public $messages;

    public $message_text;

    protected $preview;

    public function __construct()
    {
        $this->model = new InvestorChat;

        $this->chats = $this->chats = $this->model->usersChats();
        
        $this->admins = User::where('super_admin',1)->get();

    }


    public function openChat(string $user_id) {

        $user = User::find($user_id);
        
        if($user->super_admin === 1){
            $messages = $this->model->where('user_id', $user_id)->where('investor_id', auth('investor')->user()->id)->orderBy('id', 'asc')->get();
            
            $this->chats = $this->model->usersChats();
    
            $this->user = $user;
    
            $this->messages = $messages;
        }
        
        

        $this->emit('$refresh');

        
    }

    public function render()
    {
        return view('livewire.investor-admin.chat');
    }
}
