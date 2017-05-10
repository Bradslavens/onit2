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

       $response = $this->actingAs($user)->post(route('transactionFormField.store'), ['transaction_id' => $transaction['id'], 'form_id' => $form['id'], 'field_id' => $field['id'], 'value' => "123 Main", 'status' => true, 'executed_date' => time()]);

       $response->assertSee('Redirecting to')
            ->assertRedirect(route('home'));
    }
}
