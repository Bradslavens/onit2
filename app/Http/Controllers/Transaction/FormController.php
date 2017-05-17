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
            ])->get();

        if($existingForm->count() > 1){

            throw new Exception("Existing form count is wrong..");
            
            session()->flash('message', 'please contact administrator to check the log, form count is off. Thanks!');

            return redirect('home');
        }

        if(!$existingForm->isEmpty() && $existingForm->count() === 1)
        {
            // get the fields and return the view
            $transaction = \App\Transaction::find($request->transaction_id);
            
            session()->flash('message', 'Transaction: '. $transaction->name);

            return view('create.transactionFormFields', ['fields' => $existingForm[0]->fields] );
        }

        else

        {
            $form = new \App\Form;
            $form->name = $request->form;
            $form->user_id = $request->user_id;

            $form->save();

            $form->transactions()->attach($request->transaction_id);

            return view('create.transactionFormFields', ['fields' => $form->fields]);
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
            return redirect('login');
        }
        
    }
}