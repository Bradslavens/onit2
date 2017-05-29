<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddTransactionFormFieldTest extends TestCase
{
    use DatabaseMigrations;

    public function testAddTransactionFormField()
    {
        $user = factory(\App\User::class)->create(['role' => 'teammate', 'teamLeader' => 1]);

        factory(\App\Transaction::class)->create(['user_id' => $user['id']])
            ->each(function($t) use ($user)
            {
                $t->forms()->attach(factory(\App\Form::class)
                    ->create(['user_id' => $user['id']])
                    ->each(function($f) use ($user)
                        {
                            $f->fields()->attach(factory(\App\Field::class)
                                ->create(['user_id' => $user['id']]));
                        }));
            });

       $transaction = \App\Transaction::first();

       $form = \App\Form::find($transaction->forms()->first());

       $field = \App\Field::find($form->fields()->first());

       $response = $this->actingAs($user)->post(route('transactionFormFieldstore'), ['transactionID' => $transaction['id'], 'form' => $form['id'], $field['id'] => $field['form_id'], 'value' => "123 Main", 'executed_date' => time(), 'signer' => ['name', 'role', true]]);

       $response->assertSee('Redirecting to')
            ->assertRedirect(route('home'));
    }

    public function testTransactionFormFieldCreate()
    {
      $user = factory(\App\User::class)->create(['role' => 'teammate', 'teamLeader' => 1]);

      factory(\App\Form::class)->create(['user_id' => $user['teamLeader']])
          ->each( function($f) use ($user)
            {
              $f->fields()->attach(factory(\App\Field::class, 5)->create(['user_id' => $user['teamLeader']]));
            });

      $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader'], 'status' => 1]);

      $form = \App\Form::first();

      $response = $this->actingAs($user)->post(route('transactionformfieldscreate'), ['form'=> $form->name, 'transaction' => $transaction]);

      $response->assertSee('Input Form Information')
        ->assertSee('<label for');
    }
}
