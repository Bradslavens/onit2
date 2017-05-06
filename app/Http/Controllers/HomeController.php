<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Custom\TeamLeader;

class HomeController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');

        $this->user = \App\User::find(Auth::id());
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $transactions =  \App\Transaction::where('user_id', $this->user->teamLeader)->get();

        return view('index.home', ['transactions' => $transactions , 'user' => $user]);
    }
}
