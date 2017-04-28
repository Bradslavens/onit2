@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Form List</h1>
            <ul class="list-group">
                @foreach($forms as $form)
                    <li value="{{$form->id}}">{{$form->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
