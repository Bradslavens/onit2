<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionContactTest extends TestCase
{
   use DatabaseMigrations;

   public function testCreateContact()
   {
        $user = factory(\App\User::class)->create(['teamLeader' => 1, 'role' => 'admin']);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);

        $response = $this->actingAs($user)->get(route('transaction.contact.make', ['transactionID' => $transaction['id']]));

        $response->assertSee('>Add Contact<');
   }

   public function testStoreTransactionContact()
   {
        $user = factory(\App\User::class)->create(['teamLeader' => 1, 'role' => 'admin']);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);

        $response = $this->actingAs($user)->withSession(['transactionID' => $transaction['id']])->post(route('contact.store'), ['name' => 'Joe Contact', 'email' => 'joe@example.com', 'role' => 'Buyers TC']);

        $transaction = \App\Transaction::find($transaction['id']);

        $contacts = $transaction->contacts;

        $response->assertSee('Redirecting to');

        $this->assertEquals($contacts[0]->name, 'Joe Contact' );
   }
}
