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
        $user = factory(\App\User::class)->create(['role' => 'admin']);

        factory(\App\Form::class, 5)->create(['user_id'=> $user['id']])
                ->each(function($form) use ($user)
                    {
                        $form->fields()->attach(factory(\App\Field::class, 5)->create(['user_id'=> $user['id']]));
                    });

        $response = $this->actingAs($user)->get('admin/form');

        $response->assertSee('Form List');
    }

    public function testShowAddFormForm()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin']);

        factory(\App\Field::class, 10)->make(['user_id'=>$user['id']]);

        $response = $this->actingAs($user)->get(route('form.create'));

        $response->assertSee('Add Form');

        $response->assertSee('<form');

    }

    public function testAddFormAndFields()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin', 'teamLeader' => 1]);

        $field = factory(\App\Field::class)->create(['user_id' => 1]);

        $response = $this->actingAs($user)->post('/admin/form', [
            'name' => 'RPA',
            'description' => 'Residential Purchase Agreement',
            'user_id' => $user['id'],
            'fields' => $field['id'],
            ]);

        $response->assertSee('Redirecting to http');

        $response->assertRedirect(route('form.create'));
    }

    public function testEditForm()
    {

        $user = factory(\App\User::class)->create(['id'=> 1, 'role' => 'admin']);

        factory(\App\Form::class)->create([
            'name' => 'RPA',
            'description' => 'Residential Purchase Agreement',
            'user_id' => $user['id'],
            ])
                ->each(function ($form) use ($user){
                    $form->fields()->attach(factory(\App\Field::class, 5)->create(['user_id'=>$user['id']]));
                });

        $response = $this->actingAs($user)->get('/admin/form/1/edit');

        $response->assertSee('RPA');

    }

    public function testUpdateFormAndFields()
    {
        $user = factory(\App\User::class)->create(['id'=> 1, 'role' => 'admin']);

        factory(\App\Form::class)->create([
            'name' => 'RPA',
            'description' => 'Residential Purchase Agreement',
            'user_id' => $user['id'],
            ])
                ->each(function ($form) use ($user){
                    $form->fields()->attach(factory(\App\Field::class, 5)->create(['user_id'=>$user['id']]));
                });


        $response = $this->actingAs($user)->patch('/admin/form/1', [
            'name' => 'WPA',
            'description' => 'Wood Destroying Pest Addendum',
            'user_id' => $user['id'],
            'fields' => [1,2,3],
            ]);

        $response->assertRedirect(route('form.edit', ['id' => 1]));
    }

    public function testIfItDiesForWrongUser()
    {

        $user = factory(\App\User::class)->create(['id'=> 999, 'role' => 'admin']);

        factory(\App\Form::class)->create([
            'name' => 'RPA',
            'description' => 'Residential Purchase Agreement',
            'user_id' => 1,
            ])
                ->each(function ($form) use ($user){
                    $form->fields()->attach(factory(\App\Field::class, 5)->create(['user_id'=>$user['id']]));
                });


        $response = $this->actingAs($user)->patch('/admin/form/1', [
            'name' => 'WPA',
            'description' => 'Wood Destroying Pest Addendum',
            'user_id' => $user['id'],
            'fields' => [1,2,3],
            ]);

        $response->assertSessionHas('message', 'Oops, Something went wrong.');
    }
}
