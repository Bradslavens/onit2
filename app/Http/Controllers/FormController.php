<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Form;

use Illuminate\Support\Facades\Auth;

class FormController extends Controller
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
        $forms = \App\Form::all();
        
        return view('ind/form', ['forms' => $forms]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = \App\Field::where(['user_id' => Auth::id()])->get();

        return view('create.form',['fields' => $fields]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form = new \App\Form;

        $form->name = $request->name;
        $form->description = $request->description;
        $form->user_id = Auth::id();

        $form->save();

        $form->fields()->attach($request->fields);

        return redirect()->action('FormController@create');

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
        $form = \App\Form::find($id);

        $fields = \App\Field::where(['user_id' => Auth::id()])->get();

        return view('edit.form', ['form' => $form, 'fields' => $fields]);

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
