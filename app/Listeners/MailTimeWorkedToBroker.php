<?php

namespace App\Listeners;

use App\Events\UserLoggedOut;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class MailTimeWorkedToBroker
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
     * @param  UserLoggedOut  $event
     * @return void
     */
    public function handle(UserLoggedOut $event)
    {
        //
    }
}
