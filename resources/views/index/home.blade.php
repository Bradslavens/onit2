@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>Transaction List</h1>
            <a href="{{route('transaction.create')}}" class="btn btn-default">Start A Transaction</a>
            <br>
            <ul class="list-group">
            @foreach($transactions as $transaction)
              <li class="list-group-item">

                <h5 class= "list-group-item-heading"><strong>{{$transaction->address1}}</strong></h5> 

                <p class="list-group-item-text">
                        @if($transaction->status == 1)
                       <span class="label label-success">Active</span>
                        @endif
                        <a href="{{route('transaction.form.select', ['id' => $transaction->id])}}">
                            <span class="label label-primary">Resume</span>
                        </a>
                        <a href="{{route('transaction.dashboard', ['id' => $transaction->id])}}">
                            <span class="label label-info">Dashboard</span>
                        </a>
                        <a href="{{route('checklistItems.show', ['id' => $transaction->id])}}">
                            <span class="label label-primary">Checklist</span>
                        </a>
                </p>

              </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
