<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Auth;
use App\Custom\TeamLeader;

class SetTeamLeaderIDTest extends TestCase
{
    use DatabaseMigrations;

    public function testSetTeamLeaderID()
    {
        $user = factory(\App\User::class)->create(['teamLeader' => 2, 'role' => 'teammate']);

        Auth::login($user);

        $teamLeader = new TeamLeader();

        $this->assertEquals($teamLeader->id, 2);

    }
}
