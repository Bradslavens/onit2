<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class GetCurrentTransactionSignerstest extends TestCase
{

    use DatabaseMigrations;

    public function testGetCurrentContacts()
    {
        $user = factory(\App\User::class)->create(['role' => 'admin', 'teamLeader' => 2]);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['id']]);

        $signer = factory(\App\Signer::class)->create(['user_id' => $user['id']]);

        $signer = \App\Signer::find($signer['id']);

        $transaction = \App\Transaction::find($transaction['id']);

        $transaction->signers()->save($signer);

        // $response = $this->actingAs($user)
        //     ->json('GET', route('transaction.contact.getCurrent'), ['name' => $signer->name, 'transactionID' => $transaction->id]);
        //     
        // $response = $this->actingAs($user)
        //     ->get(route('transaction.contact.getCurrent'), ['name' => $signer->name, 'transactionID' => $transaction->id]);

        $response = $this->ActingAs($user)->json('GET','hello', ['name' => $signer->name, 'transactionID' => $transaction->id]);
        // 
        // 
        
        $response->assertSee('[{'); 

        $response->assertStatus(200)
            ->assertJson([
                    [
                        'id' => $transaction->id,
                    ],
                ]);

    }
}
