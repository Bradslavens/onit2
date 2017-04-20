<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MenusTest extends TestCase
{
    use DatabaseMigrations;

    public function testShowMenus()
    {
        $user = factory(\App\User::class)->make(['id' => 1]);

        $this->artisan("db:seed");

        $response = $this->actingAs($user)
              ->get('/admin/menus');

        $response->assertSee('Menus');
    }
}
