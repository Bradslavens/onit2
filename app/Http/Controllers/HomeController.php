<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $transactions =  \App\Transaction::where('user_id', Auth::User()->teamLeader)->get();

        return view('index.home', ['transactions' => $transactions], ['user' => Auth::user()] );
    }
}
