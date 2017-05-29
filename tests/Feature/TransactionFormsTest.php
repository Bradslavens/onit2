<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionFormsTest extends TestCase
{
    use DatabaseMigrations;

    public function testCreateTransactionForm()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin', 'teamLeader' => 1]);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);

        $response = $this->actingAs($user)->get(route('transaction.form.select', ['transactionID' => $transaction->id]));

        $response->assertSee('Check a Form');

        $response->assertStatus(200);
    }

    public function testAddTransactionFormWithNewForm()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin', 'teamLeader' => 1]);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);

        $response = $this->actingAs($user)->post(route('transaction.form.store'), ['user_id' => $user['teamLeader'], 'form' => 'RPA- Residential Purchase Agreement', 'transaction' => json_encode($transaction)]);

        $response->assertSee('Input Form Information');
    }

    public function testAddTransactionFormWithExistingForm()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin', 'teamLeader' => 1]);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);

        $form = factory(\App\Form::class)->create(['user_id' => $user['teamLeader']]);

        $response = $this->actingAs($user)->post(route('transaction.form.store'), ['user_id' => $user['teamLeader'], 'form' => $form['name'], 'transaction' => json_encode($transaction)]);


        $response->assertSee('Input Form Information');
    }
}
