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
            <a href="{{route('transaction.create')}}" class="btn btn-default">Start A Transaction</a>
            <br>
            <ul class="list-group">
            @foreach($transactions as $transaction)
              <li class="list-group-item">

                {{$transaction->address1}} 

                <span class= "pull-right">
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
                    <a href="#{{-- {{route('transaction.contacts', ['id' => $transaction->id])}} --}}">
                        <span class="label label-primary">Contacts</span>
                    </a>
                </span>

              </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
