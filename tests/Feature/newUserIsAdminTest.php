<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class newUserIsAdminTest extends TestCase
{
    use DatabaseMigrations;

    public function testNewUserIsAdmin()
    {
        $user = factory(\App\User::class)->make(['role' => 'admin']);

        $this->assertEquals("admin", $user['role']);
    }
}
