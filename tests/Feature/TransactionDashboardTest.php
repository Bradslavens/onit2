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
        $user = factory(\App\User::class)->create(['teamLeader' => 1, 'role' => 'admin']);

        // fill the transaction_form table
        $transaction = factory(\App\Transaction::class)->create(['user_id' => $user['teamLeader']]);   

        $transaction->forms()->attach(factory(\App\Form::class, 5)->create(['user_id' => $user['teamLeader'] ]));

        // for each of the new transaction forms add signers
        // get forms
        // for each transaction forms set signers
        $transactionForms = \App\TransactionForm::where('transaction_id', $transaction['id'])->get();

        foreach ($transactionForms as $transactionForm) 
        {
           // get the transaction from object
           $tf = \App\TransactionForm::find($transactionForm->id);

           $tf->signers()->save(factory(\App\Signer::class)->create(['user_id' => $user['teamLeader']]), ['role' => 'buyer']);
        }

        $fields = factory(\App\Field::class, 5)
            ->create(['user_id' => $user['teamLeader']])
            ->each( function ($f) use ($transaction, $user)
            {
                $i = 0;
                
                while($i < 5)
                {

                    $f->transactionFormFields()->save(factory(\App\TransactionFormField::class)->make(['transaction_id' => $transaction['id'], 'user_id' => $user['teamLeader']]));

                    $i++;
                }
            });
             
        $response = $this->actingAs($user)->get(route('transaction.dashboard', ['id' => $transaction['id']]));

        $response->assertSee($transaction->address1);  


    }
}
