<?php 

namespace App\Http\Livewire\Admin;

use App\Models\SupportChat;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Chat extends Component
{
    public $chats;

    public $search;

    private $model;

    public $admin;

    public $messages;

    public $message_text;

    public $file;

    protected $preview;

    use WithPagination;

    public function __construct()
    {
        
        // Set Admin Property

        $admin = User::where('super_admin', 1)->first();

        $this->admin = $admin;


        // Set Model Property
        $this->model = new SupportChat();

        // Set Messages Property


        $messages = $this->model->where('sender_id', auth('investor')->user()->id)->get();

        

        $this->messages = $messages;

    }

    
    // public function send() {
        
    //     $chatId     = Str::uuid();

    //     $sender_id  = auth('investor')->user()->id ?? auth()->user()->id;

    //     $type       = auth('investor')->user()->id ? 'investor' : 'user';

    //     $reciver    = $this->admin->id;

    //     $message    = $this->message_text;

    //     $this->model->create([
    //         'chat_id'       => $chatId,
    //         'sender_id'     => $sender_id,
    //         'reciver_id'    => $reciver,
    //         'message'       => $message,
    //         'sender_type'   => $type
    //     ]);

    // }

    public function render()
    {
        return view('livewire.admin.chat.index');
    }

}