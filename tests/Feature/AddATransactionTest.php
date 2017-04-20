<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AddATransactionTest extends TestCase
{
    use DatabaseMigrations;
    
    
    public function testTranactionShowAddForm()
    {
        $user = factory(\App\User::class)->make(['id' => 1]);

        $this->artisan("db:seed");

        $response = $this->actingAs($user)
              ->get('/start');

        $response->assertSee('Start a Transaction');
    }
}
