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
            return view('show.dashboard', ['transaction' => $transaction]);
        }
        else
        {
            session()->flash('message', 'Oops, Something went wrong :( ');

            return redirect('home');
        }
    }
}
