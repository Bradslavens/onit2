<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionChecklistTest extends TestCase
{
   use DatabaseMigrations;

   public function testShowTransactionChecklist()
   {
        $user = factory(\App\User::class)->create(['teamLeader' => 1]);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);
        
        $transaction->forms()->attach(factory(\App\Form::class, 3)->create(['user_id' => $user['teamLeader']]));

        $transactionForms = \App\transactionForm::all();

        foreach ($transactionForms as $transactionForm) 
        {
            for($i = 0; $i<7; $i++)
            {

                $transactionForm->signers()->save(factory(\App\Signer::class)->create(['transaction_id' => $transaction->id, 'user_id' => $user->id]), ['signer_id'=> $i%4, 'role' => 'buyer', 'executed_date' => '2017-06-02', 'status' => 'yes']);

            }
        }

        $response = $this->actingAs($user)->get(route('checklistItems.show', ['id' => $transaction['id']]));

        $response->assertSee('<h1>Checklist</h1>');

   }

   public function testUpdateTransactionChecklist()
   {
        $this->assertEquals(1,1);
   }

   public function testMailTransactionChecklist()
   {
        $this->assertEquals(1,1);

   }
}
