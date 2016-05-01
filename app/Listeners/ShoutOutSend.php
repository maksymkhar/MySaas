<?php

namespace App\Listeners;

use App\Events\ShoutOutAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ShoutOutSend
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ShoutOutAdded  $event
     * @return void
     */
    public function handle(ShoutOutAdded $event)
    {
        //
    }
}
