@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Transaction List</h1>
            <a href="/start" class="btn btn-default">Start A Transaction</a>
            <ul class="list-group">
            @foreach($transactions as $transaction)
              <li class="list-group-item">
                <span class="badge">{{$transaction->status}}</span>
                {{$transaction->name}}
              </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
