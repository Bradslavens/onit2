@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.message')
            
            <h1>Group List</h1>
            <ul class="list-group">
                @foreach($groups as $group)
                    <li value="{{$group->id}}">{{$group->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
