<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionDashboardTest extends TestCase
{
    use DatabaseMigrations;

    public function testRouteToDashboard()
    {
        $user = factory(\App\User::class)->create(['teamLeader' => 1]);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);

        $response = $this->actingAs($user)->get(route('transaction.dashboard', ['id' => $transaction['id']]));

        $response->assertSee($transaction->name);


    }
}
