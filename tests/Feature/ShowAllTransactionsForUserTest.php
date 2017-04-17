<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ShowAllTransactionsForUserTest extends TestCase
{

    use DatabaseMigrations;

    public function testShowTransactionList()
    {
        $user = factory(\App\User::class)->make();

        $response = $this->actingAs($user)
              ->get('dashboard');

        $response->assertSee('Transaction List');
    }

    public function testDashboardRequiresLogin()
    {
        // go to dashboard without a user
        $response = $this->get('dashboard');

        // confirm going to login page
        $response->assertSee('ogin');

    }
}
