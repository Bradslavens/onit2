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
        $user = factory(\App\User::class)->create(['role' => 'teammate', 'teamLeader' => 2]);

        factory(\App\Menu::class)->create(['name' => 'transactionSide', 'user_id' => 2])
            ->each(function ($m) {
                $m->items()->attach(factory(\App\Item::class, 5)->create(['user_id' => 2]));
            });

        $response = $this->actingAs($user)
              ->get(route('transaction.create'));

        $response->assertSee('Start a Transaction');
    }

    public function testTransactionStore()
    {
        $user = factory(\App\User::class)->create(['teamLeader'=> 1]);

        $response = $this->actingAs($user)->post(route('transaction.store', ['address1' => '123 Main' , 'city' => 'San Diego' , 'state' => 'CA' , 'zip' => '1111111' , 'user_id'=> $user['id']]));

        $response->assertSee('Redirecting to ');
    }
}
