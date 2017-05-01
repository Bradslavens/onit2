<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddGroupMemberTest extends TestCase
{
    use DatabaseMigrations;

    public function testShowCreateGroupForm()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->get(route('group.create'));

        $response->assertSee('<form');
    }

    public function testStoreGroup()
    {
        $user = factory(\App\User::class)->create();

        $response = $this->actingAs($user)->post(route('group.store'),['name' => 'The Warriors']);

        $response->assertSee('tttt');
    }
}
