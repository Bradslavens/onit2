<?php

namespace App\Listeners;

use App\Events\teammateInvited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendInvitationToTeammate
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
     * @param  teammateInvited  $event
     * @return void
     */
    public function handle(teammateInvited $event)
    {
        //
    }
}
