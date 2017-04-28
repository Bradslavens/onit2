@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Form</h1>
                <ul>
                  <li>{{$form->name}}</li>
                  <li>{{$form->decription}}</li>
                </ul>
                <a class="btn btn-danger" href="{{route('form.destroy', ['id=>$form=>id'])}}">Delete Form</a>

        </div>
    </div>
</div>
@endsection
