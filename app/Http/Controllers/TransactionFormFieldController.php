<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Signer as Signer;

class TransactionFormFieldController extends Controller
{

    protected $user;

    public function __construct()
    {
        $this->middleware('auth');

        $this->user = \App\User::find(Auth::id());
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
    public function create(Request $request)
    {
        $Form = \App\Form::where('name', $request->form)->first();

        $transaction = json_decode($request->transaction);

        return view('create.transactionFormFields', ['fields' => $Form->fields, 'transactionID' => $transaction->id, 'form' => $request->form]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // set the array to hold signer info from request
        $signer_ra = [];

        // check transaction id v user

        // Add transaction form
        //
        $transaction = \App\Transaction::find($request->transactionID);

        // request form is the name of the form, get the id to attach
        // 
        $form = \App\Form::where('name', $request->form)->first();

        $transaction->forms()->attach($form->id);

        $transactionForm = \App\TransactionForm::where(
            [
                ['transaction_id', $request->transactionID],
                ['form_id', $form->id],
            ]
            )
            ->first();

        if(isset($request->signer))
        {
            // set signers
            foreach ($request->signer as $key => $signerfield) 
            {
                switch ($key % 3) 
                {
                    case 0:
                        $signer_ra['name'] = $signerfield;
                        break;
                    case 1:
                        $signer_ra['role'] = $signerfield;
                        break;
                    case 2:
                        $signer_ra['signed'] = $signerfield;
                        
                        Signer::create(['user_id' => Auth::user()->teamLeader, 'transaction_id' => $request->transactionID, 'name' => $signer_ra['name']])
                        ->transactionForms()->attach($transactionForm->id);

                        break;

                    default:
                        break;
                }

            }
        }
        else
        {
            session()->flash('message', 'At least one signer is required, Thanks!');

            return redirect('home');
        }


        if(!isset($request->executed_date))
        {
            session()->flash('message', 'You must include an execution date, Thanks!');

            return redirect('home');
        }

        foreach ($_POST as $key => $value) {
            
            if(is_int($key))
            {
                $transactionFormField = new \App\TransactionFormField;

                $transactionFormField->transaction_id = $request->transactionID;
                $transactionFormField->form_id = $form->id;
                $transactionFormField->field_id = $key;
                $transactionFormField->value = $value;
                $transactionFormField->user_id = Auth::user()->teamLeader;
                $transactionFormField->executed_date = $request->executed_date;

                $transactionFormField->save();
            }
        }
        
        session()->flash('message', 'Form Successfully added!');
        
        return redirect(route('home'));

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
}
