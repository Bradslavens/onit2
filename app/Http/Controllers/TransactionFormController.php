<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Custom\TeamLeader;
use Illuminate\Support\Facades\Log;

class TransactionFormController extends Controller
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
