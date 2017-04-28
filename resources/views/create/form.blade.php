@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Add Form</h1>
            <form method="POST" action="{{route('form.store')}}">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="name">Form Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Form Name" required="">
                  </div>

                  <div class="form-group">
                      <label for="body">Enter A Description of the Form</label>
                      <input type="" class="form-control" id="body" placeholder="Enter A Description of the Form" required>
                  </div>

                <div class="form-group">
                    <label for="fields">Select Fields</label>
                    <select multiple name="fields" id="fields" class="form-control">
                      @foreach($fields as $field)
                        <option value="S{{$field->id}}">{{$field->name}}</option>f
                      @endforeach
                    </select>
                <div>

            </form>
        </div>
    </div>
</div>
@endsection
