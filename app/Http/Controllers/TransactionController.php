<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    
use Illuminate\Support\Facades\Auth;
use App\Menu;
use App\Custom\TeamLeader;

class TransactionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of transactions.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transactions =  \App\Transaction::where('teamLeader', Auth::User()->teamLeader)->get();

        return view('dashboard', ['transactions' => $transactions] );
    }

    /**
     * Show the form for creating a new transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // get the sides id
        $menu = Menu::where('name', 'transactionSide')
                    ->where('user_id', Auth::user()->teamLeader)
                    ->first();
                    
        return view('create.transaction', ['menu' => $menu]);
    }

    /**
     * Store a newly created transaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new \App\Transaction;

        $transaction->address1 = $request->address1;
        $transaction->city = $request->city;
        $transaction->state = $request->state;
        $transaction->zip = $request->zip;
        $transaction->user_id = Auth::id();

        $transaction->save();

        session()->flash('message', 'Transaction'. $transaction->address1. ' added successfully!');
        
        // event('addedTransaction');
        
        return redirect('home');

    }

    /**
     * Display the specified transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified transaction.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified transaction in storage.
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
     * Remove the specified transaction from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
