<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\User;

class TeammateInvited
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $tempPass;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(User $user, $tempPass)
    {
        $this->user = $user;
        $this->tempPass = $tempPass;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
