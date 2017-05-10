<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Form;
use Illuminate\Support\Facades\Auth;
use App\Custom\TeamLeader;
use \App\User;

class FormController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');

        $this->user = \App\User::find(Auth::id());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = \App\Form::where('user_id', $this->user->teamLeader)->get();
        
        return view('index/form', ['forms' => $forms]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = \App\Field::where(['user_id' => $this->user->teamLeader])->get();

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
        $form->user_id = $this->user->teamLeader;

        $form->save();


        $form->fields()->attach($request->fields);

        return redirect()->route('form.create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $form = \App\Form::find($id);

        return view('edit.form', ['form' => $form]);

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

        $fields = \App\Field::where(['user_id' => $this->user->teamLeader])->get();

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
        
        $form = \App\Form::find($id);

        if($form->user_id != $this->user->teamLeader)
        {
            session()->flash('message', 'Oops, Something went wrong.');

            return redirect()->route('form.edit', ['id' => $id]);

        }

        $form->name = $request->name;
        $form->description = $request->description;

        $form->save();

        $form->fields()->attach($request->fields);

        return redirect()->route('form.edit', ['id' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $form = \App\Form::find($id);

        $form->delete();

    }

    public function getForms(Request $request)
    {

        $forms = \App\Form::where([
                ['user_id' , Auth::user()->teamLeader],
                ['name','like', '%' . $request->term . '%'],
            ])
            ->get(['id','name as value']);

        return $forms;
    }
}
