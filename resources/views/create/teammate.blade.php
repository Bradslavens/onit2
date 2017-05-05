@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Invite A User to Your Team</h1>
            <form method="POST" action="{{route('teammate.store')}}">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="name">Enter the Teammate's Name.</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter the Teammate's Name.">
                  </div>

                  <div class="form-group">
                    <label for="email">New User's email</label>
                    <input name="email" type="email" class="form-control" id="email" placeholder="User's email" required>
                  </div>

                <button type="submit" class="btn btn-default">Invite User :)</button>

            </form>
        </div>
    </div>
</div>
@endsection
