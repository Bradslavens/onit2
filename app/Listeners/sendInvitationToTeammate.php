<?php

namespace App\Listeners;

use App\Events\TeammateInvited;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendNewTeamMemberLoginInfo;

class SendInvitationToTeammate
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
        Mail::to($event->user->email)
            ->send(new SendNewTeamMemberLoginInfo($event->user, $event->tempPass));
    }
}
