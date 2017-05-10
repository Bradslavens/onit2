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
                    ->where('user_id', $this->user->teamLeader)
                    ->first();
                    
        return view('transaction.start', ['menu' => $menu]);
    }

    /**
     * Store a newly created transaction in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
