@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.message')

            @if($user->role === 'admin')
                <a class="link" href="{{route('admin.home')}}">Admin</a>
            @endif

            <h1>Transaction List</h1>
            <a href="{{route('transaction.create')}}start" class="btn btn-default">Start A Transaction</a>
            <br>
            <ul class="list-group">
            @foreach($transactions as $transaction)
              <li class="list-group-item">
                <span class="badge">{{$transaction->status}}</span>
                {{$transaction->name}} <a href="{{route('transaction.form.select', ['id' => $transaction->id])}}">
                    Resume
                </a>
              </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
