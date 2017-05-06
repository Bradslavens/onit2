<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormTest extends TestCase
{
    use DatabaseMigrations;

    public function testShowForms()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin', 'teamLeader' => 1]);

        factory(\App\Form::class, 10)->make(['user_id' => 1]);

        $response = $this->actingAs($user)->get(route('form.index'));

        $response->assertSee('Form List');

    }
}
