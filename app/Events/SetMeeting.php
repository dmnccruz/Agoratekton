<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SetMeeting implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $recId;
    public $recName;
    public $callerid;
    public $callerName;
    public $dateInput;
    public $topic;
    public $callerAvatar;

    // public $callerIdsa;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($collectionsetmeeting)
    {
        $this->recId = $collectionsetmeeting->get(0);
        $this->recName = $collectionsetmeeting->get(1);
        $this->callerid = $collectionsetmeeting->get(2);
        $this->callerName = $collectionsetmeeting->get(3);
        $this->dateInput = $collectionsetmeeting->get(4);
        $this->topic = $collectionsetmeeting->get(5);
        $this->callerAvatar = $collectionsetmeeting->get(6);
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('meetChannel.'.$this->recId);
    }
}
