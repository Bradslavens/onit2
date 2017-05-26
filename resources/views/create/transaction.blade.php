@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Start a Transaction</h1>
            <form method="post" action="{{route('transaction.store')}}">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="address1">Address</label>
                    <input  name="address1" type="text" class="form-control" id="address1" placeholder="Address" required>
                  </div>

                  <div class="form-group">
                    <label for="city">City</label>
                    <input  name="city" type="text" class="form-control" id="city" placeholder="City" required>
                  </div>

                  <div class="form-group">
                    <label for="state">State</label>
                    <input  name="state" type="text" class="form-control" id="state" placeholder="State" required>
                  </div>

                  <div class="form-group">
                    <label for="zip">Zip</label>
                    <input  name="zip" type="text" class="form-control" id="zip" placeholder="Zip" required>
                  </div>

                <div class="form-group">
                <label for="transactionSide">Which Transaction Side do we Represent</label>
                    <select name="transactionSide" id="transactionSide" class="form-control">
                    @foreach($menu->items as $transactionSide)

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
