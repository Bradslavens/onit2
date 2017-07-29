<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Events\TeammateInvited;

use jarne\password\Password as Password;

class TeammateController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // get the team leader based on auth user id
        $teamLeader = \App\User::find(Auth::id());

        // get the users teammates
        $teammates = \App\User::where('teamLeader', $teamLeader)
                ->get();
        
        return view('index.teammate',['teammates'=>$teammates]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create.teammate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $password = new Password();
        $tempPass = $password->generate(10);

        $teammate = new \App\User;

        $teammate->email = $request->email;
        $teammate->name = $request->name;
        $teammate->teamLeader = Auth::id();
        $teammate->role = 'teammate';
        $teammate->password = bcrypt($tempPass);

        $teammate->save();

        $teammate2 = \App\User::findOrFail($teammate->id);

        event(new TeammateInvited($teammate2, $tempPass));

        return redirect(route('teammate.index')); 
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
