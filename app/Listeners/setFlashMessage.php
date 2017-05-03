<?php

namespace App\Listeners;

use App\Events\TeammateInvited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SetFlashMessage
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
     * @param  TeammateInvited  $event
     * @return void
     */
    public function handle(TeammateInvited $event)
    {
        //
    }
}
