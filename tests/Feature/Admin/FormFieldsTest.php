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

    public function testShowAddFormForm()
    {
        $user = factory(\App\User::class)->make(['id'=> 1]);

        factory(\App\Field::class, 10)->make(['user_id'=>$user['id']]);

        $response = $this->actingAs($user)->get('/admin/form');

        $response->assertSee('Add Form');

        $response->assertSee('<form');

    }

    public function testAddFormAndFields()
    {
        $user = factory(\App\User::class)->create(['id'=> 1]);

        $response = $this->actingAs($user)->post('/admin/form', [
            'name' => 'RPA',
            'description' => 'Residential Purchase Agreement',
            'user_id' => $user['id'],
            'fields' => [1,2,3],
            ]);

        $response->assertSee('Redirecting to http://localhost/admin/form');
    }

    public function testShowFormUpdateForm()
    {

        $user = factory(\App\User::class)->create(['id'=> 1]);

        factory(\App\Form::class)->create([
            'name' => 'RPA',
            'description' => 'Residential Purchase Agreement',
            'user_id' => $user['id'],
            ])
                ->each(function ($form) use ($user){
                    $form->fields()->attach(factory(\App\Field::class, 5)->create(['user_id'=>$user['id']]));
                });

        $response = $this->actingAs($user)->patch('/admin/form/?id=1');

        $response->assertSee('RPA');

    }
}
