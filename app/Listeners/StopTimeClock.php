<?php

namespace App\Listeners;

use App\Events\UserLoggedOut;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\WorkTime;
use App\User;
use Illuminate\Support\Facades\Auth;

class StopTimeClock
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
        $user = User::find(Auth::id());
        $workTime = new WorkTime;
        $workTime->status = 'end';
        
        $user->workTimes()->save($workTime);
    }
}
