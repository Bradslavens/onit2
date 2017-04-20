@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Start a Transaction</h1>
            <form method="post" action="/start">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="name">Transaction Name or Address</label>
                    <input type="text" class="form-control" id="name" placeholder="Transaction Name or Address">
                  </div>

                <div class="form-group">
                <label for="transactionSide">Which Transaction Side do we Represent</label>
                    <select name="transactionSide" id="transactionSide" class="form-control">
                    @foreach($transactionSides as $transactionSide)

                        <option value="{{$transactionSide->id}}">{{$transactionSide->name}}</option>

                    @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-default">Start</button>
            </form>
        </div>
    </div>
</div>
@endsection
