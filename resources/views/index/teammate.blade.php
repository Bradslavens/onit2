@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.message')

            <h1>Current TeamMates</h1>
            <ul class="list-group">
                @foreach($teammates as $teammate)
                    <li value="{{$teammate->id}}">{{$teammate->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
