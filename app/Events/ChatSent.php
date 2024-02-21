<?php

namespace App\Events;

use App\Models\Investor;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChatSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reciver;

    public $message;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($reciver, $type, $message)
    {
        $this->reciver   = $reciver;
        $this->message   = $message;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('chat'.$this->reciver);
    }
    public function broadcastAs()
    {
        return 'sendMessage';
    }
}
