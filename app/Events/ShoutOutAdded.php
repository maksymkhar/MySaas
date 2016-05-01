<?php

namespace App\Events;

use App\Events\Event;
use App\ShoutOut;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ShoutOutAdded extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $shoutOut;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ShoutOut $shoutOut)
    {
        $this->shoutOut = $shoutOut;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['shoutout-added'];
    }
}
