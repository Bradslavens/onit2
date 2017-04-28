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
        $user = factory(\App\User::class)->create();

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['id']]);

        $response = $this->actingAs($user)->get('transactionForm/check/'. $transaction->id);

        $response->assertSee('Check a Form');

        $response->assertStatus(200);
    }
}
