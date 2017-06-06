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

        session('transactionID', $id);

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

            // set the fields
            
            $fields = \App\TransactionFormField::where([
                ['transaction_id', $id],
                ['user_id', Auth::user()->teamLeader],
                ])->get()->groupBy('field_id');

            $dashFields['nhd'] = "NA";
            $dashFields['hw'] = "NA";
            $dashFields['hwCompany'] = "NA";
            $dashFields['hwAmount'] = "NA";
            $dashFields['hwIncludes'] = "NA";
            $dashFields['dates'] = [];

            foreach ($fields as $field) 
            {
                $sorted = $field->sortBy('executed_date')->last();

                if(stripos($sorted->field->name, "nhd") !== false)
                {
                    $dashFields['nhd'] = $sorted->value;
                }
                elseif (stripos($sorted->field->name, "home warranty company") !== false) 
                {
                    $dashFields['hwCompany'] = $sorted->value;
                }
                elseif (stripos($sorted->field->name, "home warranty amount") !== false) 
                {
                    $dashFields['hwAmount'] = $sorted->value;
                }
                elseif (stripos($sorted->field->name, "home warranty includes") !== false) 
                {
                    $dashFields['hwIncludes'] = $sorted->value;
                }
                elseif (stripos($sorted->field->name, "date") !== false) 
                {
                    $dashFields['dates'][$sorted->field->name] = $sorted->value;
                }

            }
            
            return view('show.dashboard', ['transaction' => $transaction, 'signers' => $signer_array, 'fields' => $fields, 'dashFields' => $dashFields, ]);
        }
        else
        {
            session()->flash('message', 'Oops, Something went wrong :( ');

            return redirect('home');
        }
    }
}
