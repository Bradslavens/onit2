@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Add Contact</h1>

            {{-- the transaction id is in the session transactionID --}}

            <form method="POST" action="{{route('contact.store')}}">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="name">Contact Name</label>
                    <input name="name" type="text" class="form-control" id="name" placeholder="Contact Name" required>
                  </div>

                  <div class="form-group">
                      <label for="email">Email</label>
                      <input name="email" type="email" class="form-control" id="email" placeholder="Enter An Email Address">
                  </div>

                <div class="form-group">
                    <label for="role">Select Role</label>
                    <select multiple name="role" id="role" class="form-control">
                      <option value="buyers agent">Buyer's Agent</option>
                      <option value="sellers agent">Seller's Agent</option>
                      <option value="buyer">Buyer</option>
                      <option value="seller">Seller</option>
                      <option value="buyers tc">Buyer's TC</option>
                      <option value="sellers tc">Seller's TC</option>
                      <option value="escrow">Escrow</option>
                    </select>
                <div>

                <button type="submit" class="btn btn-default">Add Contact</button> 

            </form>
        </div>
    </div>
</div>
@endsection
