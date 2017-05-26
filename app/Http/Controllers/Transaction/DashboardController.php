<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function show($id)
    {
        $transaction = \App\Transaction::find($id);

        if($transaction->user_id === Auth::user()->teamLeader)
        {

            $transactionForms = \App\TransactionForm::where('transaction_id', $id)->get();

            $signer_array = [];
            $count = 0;

            foreach ($transactionForms as $transactionForm) 
            {

                $tf = \App\TransactionForm::find($transactionForm->id);

                foreach ($tf->signers as $signer) 
                {

                    $signer_array[$count]['role'] = $signer->pivot->role;
                    $signer_array[$count]['name'] = $signer->name;

                    $count++;
                }
            }
            
            return view('show.dashboard', ['transaction' => $transaction, 'signers' => $signer_array]);
        }
        else
        {
            session()->flash('message', 'Oops, Something went wrong :( ');

            return redirect('home');
        }
    }
}
