<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\WorkTime;
use App\User;

class StartTimeClock
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
     * @param  UserLoggedIn  $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        $user = User::find($event->user->id);
        $workTime = new WorkTime;
        $workTime->status = 'start';

        $user->workTimes()->save($workTime);
    }
}
