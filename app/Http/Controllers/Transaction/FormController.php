<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Custom\TeamLeader;
use Illuminate\Support\Facades\Log;

class FormController extends Controller
{
    protected $user;

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
        // return view('create.transactionForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Is this a new form
        // 
        $teamLeader = Auth::user()->teamLeader;

        $existingForm = \App\Form::where([
                ['name', $request->form],
                ['user_id', $teamLeader],
            ])->orWhere([
                ['name', $request->form],
                ['user_id', 0],
            ])->get();

        if($existingForm->count() > 1){
            
            session()->flash('message', 'please contact administrator to check the log, form count is off. Thanks!');

            return redirect('home');
        }

        if(!$existingForm->isEmpty() && $existingForm->count() === 1)
        {
            /// form already exists
            // json decode transaction 
            $transaction = json_decode($request->transaction);

            // get the current transaction form 
            $transactionForm = \App\TransactionForm::where('form_id' , $existingForm[0]->id)->first();

            // set the signers array
            $signers_ra = [];


            // match the existing form signers 'name' (is role) with the transaction form signers role if == add to the signer's array
            if(isset($transactionForm->signers))
            {
                // make an array to compare signers
                $raToCompareSigners = [];

                foreach ( $transactionForm->signers->toArray() as $signer) 
                {
                    
                    if(!in_array($signer['pivot']['signer_id'], $raToCompareSigners))
                    {
                        $efs = $existingForm[0]->signers;

                        foreach ($efs as $ef) 
                        {
                            if($ef['name'] == $signer['pivot']['role'])
                            {
                                $signers_ra[] = $signer ;
                            }
                        }

                    }
                    foreach ($signers_ra as $sr) 
                    {
                        $raToCompareSigners[] = $sr['pivot']['signer_id']; 
                    }
                }
            }

            session()->flash('message', 'Transaction: '. $transaction->address1);

            return view('create.transactionFormFields', ['fields' => $existingForm[0]->fields, 'transactionID' => $transaction->id, 'form' => $existingForm[0]->id, 'signers' => $signers_ra] );
        }

        else
        {
            $form = new \App\Form;
            $form->name = $request->form;
            $form->user_id = Auth::user()->teamLeader;

            $form->save();

            $transaction = json_decode($request->transaction);

            if($transaction->user_id === Auth::user()->teamLeader)
            {
                $form->transactions()->attach($transaction->id);

                session()->flash('message', 'Transaction: '. $transaction->address1);

                return view('create.transactionFormFields', ['fields' => $form->fields, 'transactionID' => $transaction->id, 'form' => $form->id]);
            }
            else
            {
                session()->flash('message', 'Oops, We could not find that transaction :(.');

                return redirect('home');
            }

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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


    public function check($transactionID)
    {   
        $transaction = \App\Transaction::find($transactionID);

        if($transaction->user_id !== Auth::user()->teamLeader)
        {
            session()->flash('message', 'Oops something went wrong. Please login in again. Thanks!');
            return redirect('login');
        } 

        return view('create.transactionForm', ['transaction' => $transaction]);
    }



    public function getTransactionForms(Request $request)
    {
        
        $transaction = \App\Transaction::find($request->id);

        if($transaction->user_id === Auth::User()->teamLeader)
        {
            return $transaction->forms;
        }
        else
        {
            session()->flash('message', 'Oops, We could not find that transaction :(.');

            return redirect('home');
        }
        
    }
}
