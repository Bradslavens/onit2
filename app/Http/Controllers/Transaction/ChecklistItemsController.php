<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ChecklistItemsController extends Controller
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
        
        // generate a checklist
        // first get all the transaction forms
        // // then for each form get the status 
        // // 
        $transaction = \App\Transaction::find($id);

        // verify user owns transaction
        if($transaction->user_id == Auth::user()->teamLeader)
        {

            // set the checklist array
            $checklist = [];
            // set form array counter
            // 
            // $f = 0;
            foreach ($transaction->forms as $form) 
            {
                // get all the signers for the form
                $transactionForm = \App\transactionForm::find($form->pivot->id);

                $tempStatusArray = [];

                foreach ($transactionForm->signers as $signer) 
                {
                    $tempStatusArray[$signer->name][] = $signer->pivot->status;
                    // [$signer->pivot->status, 'role'=> $signer->pivot->role, 'signer_id' => $signer->id, 'name' => $signer->name, 'form_id' => $form->id];
                }


                $groups = $transactionForm->signers->groupBy('name')->toArray();

                $merged = [];
                // for each tempstatus array which is the signer id.. groups so for each signer
                // check if the array contains "status => yes"
                foreach ($tempStatusArray as $key => $trs) 
                {
                    // does $trs contain yes?
                    if(collect($trs)->contains('yes'))
                    {
                        foreach ($groups as $group) 
                        {
                            if($group[0]['name'] == $key)
                            {
                                $checklist[$form->name][] = ['status' => 'yes', 'role' => $group[0]['pivot']['role'], 'name' => $group[0]['name'], 'id' => $group[0]['id']];
                            }
                        }
                        
                    }
                    else
                    {
                        foreach ($groups as $group) 
                        {
                            if($group[0]['name'] == $key)
                            {
                                $checklist[$form->name][] = ['status' => 'no', 'role' => $group[0]['pivot']['role'], 'name' => $group[0]['name'], 'id' => $group[0]['id']];
                            }
                        }
                        
                    }  
                }
            }
        }

        session()->flash('message', 'Checklist for ' . $transaction->name);

        return view('show.checklist', ['checklistItems' => $checklist]);
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
