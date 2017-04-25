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
        $user = factory(\App\User::class)->make(['id'=> 1 ]);

        factory(\App\Form::class, 10)->make(['user_id' => 1]);

        $response = $this->actingAs($user)->get('/admin/forms');

        $response->assertSee('Form List');

    }
}
