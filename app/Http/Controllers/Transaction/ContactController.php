<?php

namespace App\Http\Controllers\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = \App\Transaction::find(session('transactionID'));

        $contact = new \App\Contact;

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->user_id = Auth::user()->teamLeader;
        $contact->role_a = $request->role;

        $contact->save();

        $transaction->contacts()->save($contact);

        session()->flash('message', $contact->name . ' was successfully added to the Transaction :)');

        return redirect(route('transaction.dashboard', ['id' => $transaction->id]));
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

    public function make($transactionID)
    {
        $transaction = \App\Transaction::find($transactionID);

        // verify user owns the transaction
        if($transaction->user_id === Auth::user()->teamLeader)
        {

            session(['transactionID' => $transaction->id]);

            return view('create.transaction.contact');
        }
        else
        {
            session()->flash('message', 'Oops, something went wrong, we can\'t find that transaction.');

            return redirect('home');
        }
    }
}
