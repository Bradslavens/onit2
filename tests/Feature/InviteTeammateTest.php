<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class InviteTeammateTest extends TestCase
{
     use DatabaseMigrations;

    // test show current team mates
    public function testTeammateIndexPage()
    {
        $user = factory(\App\User::class)->make();

        $resource = $this->actingAs($user)->get(route('teammate.index'));

        $resource->assertSee('Current TeamMates');
    }
    // test show invite user form
    
    // test invite user with temporary password

    // test user confirms registration
}
