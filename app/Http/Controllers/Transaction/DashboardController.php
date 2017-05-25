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

            dd($transactionForms);

            foreach ($transactionForms as $transactionForm) 
            {

                dd($transactionForm->id);
                $tf = \App\TransactionForm::find($transactionForm->id);

                // dd($tf->signers);
            }
            
            // return view('show.dashboard', ['transaction' => $transaction, 'contacts' => $signers]);
        }
        else
        {
            session()->flash('message', 'Oops, Something went wrong :( ');

            return redirect('home');
        }
    }
}
