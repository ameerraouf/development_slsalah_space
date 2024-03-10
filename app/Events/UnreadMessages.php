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

class UnreadedMessages implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reciver;
    public $count;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($reciver, $count)
    {
        $this->reciver   = $reciver;
        $this->count     = $count;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('unreaded'.$this->reciver);
    }
    public function broadcastAs()
    {
        return 'unreaded';
    }
}
