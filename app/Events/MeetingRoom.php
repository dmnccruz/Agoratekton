<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MeetingRoom implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $meetingId2;
    public $callerId2meeting;
    public $receiverId2meeting;

    // public $callerIdsa;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($collectionmeeting)
    {
        $this->meetingId2 = $collectionmeeting->get(0);
        $this->callerId2meeting = $collectionmeeting->get(1);
        $this->receiverId2meeting = $collectionmeeting->get(2);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('callChannelMeeting.'.$this->callerId2meeting);
    }
}
