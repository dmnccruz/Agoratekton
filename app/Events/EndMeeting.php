<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EndMeeting implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $callerId2endmeeting;

    // public $callerIdsa;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($collectionendmeeting)
    {
        $this->callerId2endmeeting = $collectionendmeeting->get(0);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('callChannelendMeeting.'.$this->callerId2endmeeting);
    }
}
