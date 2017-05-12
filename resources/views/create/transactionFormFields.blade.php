@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.message')
            
            <h1>Input Form Information</h1>
            <form method="post" action="{{route('transactionFormFieldstore')}}">
                {{ csrf_field() }}

                @foreach($fields as $field)
                  <div class="form-group">
                    <label for="{{$field->name}}">{{$field->name}}</label>
                    <input  name="{{$field->id}}" type="{{$field->type}}" class="form-control" id="{{$field->id}}" placeholder="{{$field->name}}">
                  </div>
                @endforeach

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
