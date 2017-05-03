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
        $user = factory(\App\User::class)->make(['role' => 'admin']);

        factory(\App\User::class, 10)->make(['teamLeader' => $user['id']]);

        $resource = $this->actingAs($user)->get(route('teammate.index'));

        $resource->assertSee('Current TeamMates');
    }
    // test show invite user form
    public function testShowInviteTeammateForm()
    {
        $user = factory(\App\User::class)->make();

        $response = $this->actingAs($user)->get(route('teammate.create'));

        $response->assertSee('Invite A User to Your Team')
            ->assertSee('<form');
    }
    
    // test store teammate with temporary password
    public function testStoreUserWithTemporaryPassword()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin']);

        $response = $this->actingAs($user)->post(route('teammate.store', ['email' => 'teammate@example1.com', 'role' =>'teammate', 'name' => 'Tammy Teammate']));

        $response->assertSee('Redirecting');
        $response->assertRedirect(route('teammate.index'));

    }

    public function testEventToFlashNameToSession()
    {
        $user = factory(\App\User::class)->make(['role' => 'admin']);

        factory(\App\User::class, 10)->make(['teamLeader' => $user['id']]);

        $resource = $this->actingAs($user)->withSession(['message' => 'Congrats'])->get(route('teammate.index'));

        $resource->assertSee('Congrats');

    }

    // test invite user with temporary password

    // test teammate updates password
    // test user confirms registration
    // test middleware role admin
}
