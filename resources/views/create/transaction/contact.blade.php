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
                    <select name="role" id="role" class="form-control">
                      <option value="Buyer's Agent">Buyer's Agent</option>
                      <option value="Seller's Agent">Seller's Agent</option>
                      <option value="Buyer">Buyer</option>
                      <option value="Seller">Seller</option>
                      <option value="Buyer's TC">Buyer's TC</option>
                      <option value="Seller's TC">Seller's TC</option>
                      <option value="Escrow">Escrow</option>
                    </select>
                <div>
                <br>
                <input type="submit" class="form-control" value="Add Contact">

            </form>
        </div>
    </div>
</div>
@endsection
