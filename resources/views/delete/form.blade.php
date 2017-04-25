@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Menus</h1>
            <ul class="list-group">
                @foreach($menus as $menu)
                    <li value="{{$menu->id}}">{{$menu->name}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
