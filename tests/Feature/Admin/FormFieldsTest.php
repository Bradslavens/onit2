<?php

namespace Tests\Feature\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FormFieldsTest extends TestCase
{
    use DatabaseMigrations;

    public function testFormFields()
    {
        $user = factory(\App\User::class)->make(['id'=> 1]);

        factory(\App\Form::class, 5)->create(['user_id'=> $user['id']])
                ->each(function($form) use ($user)
                    {
                        $form->fields()->attach(factory(\App\Field::class, 5)->create(['user_id'=> $user['id']]));
                    });

        $response = $this->actingAs($user)->get('/admin/forms');

        $response->assertSee('Form List');
    }
}
