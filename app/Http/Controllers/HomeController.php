<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Custom\TeamLeader;

class HomeController extends Controller
{

    protected $teamLeader;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

        // set team leader
        $this->teamLeader = new TeamLeader;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $transactions =  \App\Transaction::where('user_id', $this->teamLeader->id)->get();

        return view('index.home', ['transactions' => $transactions , 'user' => $user]);
    }
}
