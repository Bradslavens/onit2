@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Add Form</h1>
            <form method="POST" action="\admin\form">
                {{ csrf_field() }}

                <input type="hidden" name="_method" value="PUT">

                  <div class="form-group">
                    <label for="name">Update Form</label>
                    <input value="{{$form->name}}" type="text" class="form-control" id="name" placeholder="Form Name" required="">
                  </div>

                  <div class="form-group">
                      <label for="body">Enter A Description of the Form</label>
                      <input value="{{$form->description}}" type="text" class="form-control" id="body" placeholder="Enter A Description of the Form" required>
                  </div>

                <div class="form-group">
                    <label for="fields">Select Fields</label>
                    <select multiple name="fields" id="fields" class="form-control">
                      @foreach($fields as $field)
                        <option value="{{$field->id}}">{{$field->name}}</option>
                      @endforeach
                    </select>
                <div>

                <button type="submit" class="btn btn-default"></button>

            </form>
        </div>
    </div>
</div>
@endsection
