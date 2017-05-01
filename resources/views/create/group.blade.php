@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Add Group</h1>
            <form method="POST" action="{{route('group.store')}}">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="name">Group Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Group Name" required>
                  </div>

                <button type="submit" class="btn btn-default">Add Group</button>

            </form>
        </div>
    </div>
</div>
@endsection
