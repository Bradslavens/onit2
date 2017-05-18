@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.message')
            
            <h1>Input Form Information</h1>
            <form method="post" action="{{route('transactionFormFieldstore')}}">
                {{ csrf_field() }}

                @foreach($fields as $field)
                  <div class="form-group">
                    <label for="{{$field->name}}">{{$field->name}}</label>
                    <input  name="{{$field->id}}" type="{{$field->type}}" class="form-control" id="{{$field->id}}" placeholder="{{$field->name}}">
                  </div>
                @endforeach

                <fieldset>
                    <legend id="signerLegend")>Form Signers</legend>
                    
                    <a href="#" id="newSignerLink">Add a Signer</a>
                </fieldset>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script>
$(document).ready(function(){

    var signerfield = "<div class='form-group'><label for='signerName'>Signers Name</label><input type='text' name='signer[]' class='form-control' placeholder='Signer Name'></div><div class='form-group'><label for='signerRole'>Signers Role</label><select name='signer[]' class='form-control'><option value='Buyer'>Buyer</option><option value='Seller'>Seller</option><option value='ListngAgent'>Listing Agent</option><option value='SellingAgent'>Selling Agent</option><option value='Escrow'>Escrow</option></select></div>";

    signerfield +=            "<div class='checkbox'>";
    signerfield +=                "<label>";
    signerfield +=                    "<input type='checkbox' name='signer[]' value='yes'>";
    signerfield +=                    "Yes";
    signerfield +=                "</label>";
    signerfield +=            "</div>";
    signerfield +=            "<div class='checkbox'>";
    signerfield +=                "<label>";
    signerfield +=                    "<input type='checkbox' name='signer[]' value='no'>";
    signerfield +=                    "No";
    signerfield +=                "</label>";
    signerfield +=            "</div>";
    
    $("#newSignerLink").click(function(){
        
        event.preventDefault();

        $( "#signerLegend" ).append( signerfield );
    });
});
</script>

@endsection


