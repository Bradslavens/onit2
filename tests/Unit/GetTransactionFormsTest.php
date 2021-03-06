<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetTransactionFormsTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetTransactionFormsReturnsAListOfForms()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin', 'teamLeader' => 1]);

        factory(\App\Transaction::class)->create(['user_id'=>1])            
                ->each( function($t) use ($user)
                    {
                        $t->forms()->attach(factory(\App\Form::class, 10)->create(['user_id'=>1]));
                    });        
        
        $transaction = \App\Transaction::first();

        $response = $this->actingAs($user)->json('GET', 'transactionForms' , ['id' => $transaction['id']]);

        $response->assertStatus(200)
            ->assertJson([
                ['id' => 1],
                ]);

    }
}
