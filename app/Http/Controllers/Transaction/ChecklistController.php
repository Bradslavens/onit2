<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChecklistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $is is transaction id
        
        // generate a checklist
        // first get all the transaction forms
        // // then for each form get the status 
        // // 
        $transaction = \App\Transaction::find($id);

        // verify user owns transaction
        if($transaction->user_id == Auth::user()->teamLeader)
        {
            // test building arrays
            // 
            
            // $a = ['brad' => ['name' => 'a'],['b'],['c']];

            // foreach ($a as $key => $value) {
                    
            //         $d['d'] = [1,2,3];
            //         $b[$value] = $d['d'];
            //     }    

            // dd($a);

            // // end test
            // // 
            // die();


            // set the checklist array
            $checklist = [];

            // set form array counter
            // 
            // $f = 0;
            foreach ($transaction->forms as $key => $form) 
            {
                // get all the signers for the form
                $transactionForms = \App\transactionForm::where([['transaction_id' , $transaction->id], ['form_id', $form->id],])->get();

                // now iterate through each form signer an assign status
                foreach ($transactionForms as $transactionForm) 
                {
                    foreach ($transactionForm->signers as $transactionFormSigner) 
                    {

                        $transactionFormSigner = collect($transactionFormSigner);
                        //
                        // assign the status, everytime some signs is adds a new recored to transaction form signers table so 
                        // we need to group them and then check if they have a yes under status for any signature
                        // if they do it means they signed the form so we assign it a value of yes
                        // if not then we assign it a value of no
                        // 
                        if($transactionFormSigner['pivot']['status'] == 'yes')
                        {
                            $checklist['TransactionForms'][$form->name]['signer'] = $transactionFormSigner;
                        }
                        else
                        {
                            dd('no');
                        }
                    }                        
                }
            }
        }

        dd($checklist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
