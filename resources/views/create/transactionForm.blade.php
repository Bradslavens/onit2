@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Check a Form</h1>
            <form method="post" action="{{route('transactionForm.store')}}">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="formName">Enter Form Name</label>
                    <input type="text" class="form-control" id="formName" placeholder="Enter Form Name" required>
                  </div>

                @if(exists($fields))

                @foreach($fields as $field)
                      <div class="form-group">
                        <label for="{{$field->id}}">{{$field->label}}</label>
                        <input name="{{$field->name}}" title="{{$field->description}}" type="text" class="form-control" id="{{$field->id}}" placeholder="{{$field->label}}">
                      </div>
                @endforeach

                @endif
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
