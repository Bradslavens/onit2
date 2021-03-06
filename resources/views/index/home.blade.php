@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <h1>Transaction List</h1>
            <a href="{{route('transaction.create')}}" class="toolTip btn btn-default" data-title="Click Here to Start a Transaction :)">Start A Transaction</a>
            <br>
            <ul class="list-group">
            @foreach($transactions as $transaction)
              <li class="list-group-item">              
                <h5 class= "list-group-item-heading"><strong>{{$transaction->address1}}</strong></h5> 
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu-items" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="menu-items">
                    <ul class="nav nav-pills">
                        <li role="presentation" class="toolTip" data-title="Click Here to Resume a Transaction :)"><a href="{{route('transaction.form.select', ['id' => $transaction->id])}}">
                                <span class="label label-primary" >Resume</span>
                            </a></li>
                        <li role="presentation"><a href="{{route('transaction.dashboard', ['id' => $transaction->id])}}">
                                <span class="label label-info">Dashboard</span>
                            </a></li>
                        <li role="presentation"><a href="{{route('checklistItems.show', ['id' => $transaction->id])}}">
                                <span class="label label-primary">Checklist</span>
                            </a></li>
                    </ul>
                </div>
              </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
