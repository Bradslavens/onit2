<?php

namespace Tests\Unit;

use Tests\TestCase;

use \App\Events\TeammateInvited;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use Illuminate\Support\Facades\Event;

class TeammateInvitedTest extends TestCase
{
    use DatabaseMigrations;
    
    public function testTeammateInvitedEvent()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin']);

        $teammate = factory(\App\User::class)->create(['role' => 'teammate', 'teamLeader' => $user['id']]);

        Event::fake();

        // $teammate = new \App\User;

        // $teammate->email = 'b@gg.d';
        // $teammate->name = 'mr mate';
        // $teammate->teamLeader = $user['id'];
        // $teammate->role = 'teammate';
        // $teammate->password = bcrypt('password');

        // $teammate->save();
        // dd($teammate->id);

        event(new TeammateInvited($teammate));

        Event::assertDispatched(TeammateInvited::class, function($e) use ($teammate){
                    return $e->user->id === $teammate['id'];
        });
    }
}
