<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransactionFormSignersTest extends TestCase
{
    use DatabaseMigrations;

    public function testAddTransactionFormSigners()
    {
        $user = factory(\App\User::class)->create(['role' => 'teammate', 'teamLeader' => 1]);

        $transaction = factory(\App\Transaction::class)->create(['user_id' => 1]);
        
        $form = factory(\App\Form::class)->create(['user_id' => 1]);

        $transaction->forms()->attach($form['id']);

        $transactionForm = \App\TransactionForm::where([
                ['transaction_id' , $transaction['id']],
                ['form_id' , $form['id']],
            ])
            ->first();

        $this->assertEquals($transactionForm->transaction_id, $transaction['id']);


        //// Add signers
        $transactionForm->signers()->attach(factory(\App\Signer::class, 3)->create(['user_id' => 1]));

        $tf = \App\TransactionForm::first();

        $signer = $tf->signers()->first();

        $this->assertEquals($signer->id, 1);
    }

}
