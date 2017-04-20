<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddATransactionTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testTranactionShowAddForm()
    {
        $user = factory(\App\User::class)->make(['id' => 1]);

        $response = $this->actingAs($user)
              ->get('/start');

        $response->assertSee('Start A Transaction');
    }
}
