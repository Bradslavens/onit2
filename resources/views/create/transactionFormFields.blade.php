@extends('layouts.app')

@section('stylesheet')

    @include('partials.jqthemes')

@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            @include('partials.message')
 
            
            <h1>Input Form Information</h1>
            <form method="post" action="{{route('transactionFormFieldstore')}}">
                {{ csrf_field() }}

                <input type="hidden" name="transactionID" value="{{$transactionID}}">
                <input type="hidden" name="form" value="{{$form}}">

                <div id="fieldExisting"></div>
                    
                <a id="fieldButton" href="#">Add Field</a>
                &nbsp; / &nbsp;
                <a id="newFieldButton" href="#">Can't find the one you want? Add a new field</a>

                <div id="fieldContainer">

                    <div id="newField1" style= "display:none; " class="form-group">
                        <label for="fieldSearch">Enter the Field Name and select if it already exists</label>
                        <input form="newField" class="form-control" type="text" name="fieldSearch" id="fieldSearch">
                    </div>

                </div>

                @foreach($fields as $field)
                  <div class="form-group">
                    <label for="{{$field->name}}">{{$field->name}}</label>
                    <input  name="{{$field->id}}" type="{{$field->type}}" class="form-control" id="{{$field->id}}" placeholder="{{$field->name}}">
                  </div>
                @endforeach

                <fieldset>
                    <legend id="signerLegend")>Form Signers</legend>
                    
                    <div class="ui-widget">
                      <label for="signers">Add A Signer: </label>
                      <input id="signers">
                    </div>
                    <button id="newSigner">Add</button>
                    <br>
                    <div id="signerContainer2">
                        
                    </div>

                    @if(isset($signers))
                        @foreach($signers as $signer)

                        <br>{{$signer['name']}} - {{$signer['pivot']['role']}} <br>
                          <input type="hidden" name="signer[]" value="{{$signer['name']}}">
                          <input type="hidden" name="signer[]" value="{{$signer['pivot']['role']}}">

                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="signer[]" value="yes"> 
                              signed
                            </label>
                          </div>

                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="signer[]" value="no"> 
                              not signed
                            </label>
                          </div>

                        @endforeach

                        </div>
                    @endif
                </fieldset>
                
                <div class="form-group">
                    <label for="executed_date">Date Signed:</label>
                    <input type="date" name="executed_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-default ">Submit</button>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>

<script>
$(document).ready(function(){

    // add new form field
    $("#fieldButton").click(function()
        {
            $("#fieldSearch").parent().show();
        });

    // set variable for signer field html
    var signerfield = "<h6>Signer</h6><div class='form-group'><label for='signerName'>Signers Name</label><input type='text' name='signer[]' class='form-control' placeholder='Signer Name'></div><div class='form-group'><label for='signerRole'>Signers Role</label><select name='signer[]' class='form-control'><option value='Buyer'>Buyer</option><option value='Seller'>Seller</option><option value='ListngAgent'>Listing Agent</option><option value='SellingAgent'>Selling Agent</option><option value='Escrow'>Escrow</option></select></div>";

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
    

    // // set the function for new signer link
    // $("#newSignerLink").click(function(){
        
    //     event.preventDefault();

    //     $( "#signerLegend" ).after( signerfield );
    // });   


    var newField;

        newField =     "<h6>New Field</h6>";
        newField +=    "<div class='form-group ui-widget'>";
        newField +=        "<label for='newField'>What would you like to call the new field?</label>";
        newField +=        "<input id='newField' class='form-control' type='text' name='newField[]' placeholder='Purchase Price'>";
        newField +=    "</div>";

        newField +=    "<div class='form-group'>";
        newField +=        "<label for='newField2'>What type of field is it?</label>";
        newField +=        "<select class='form-control' name='newField[]'>";
        newField +=            "<option value='text'>Text</option>";
        newField +=            "<option value='date'>Date</option>";
        newField +=        "</select>";
        newField +=    "</div>";

        newField +=    "<div class='form-group'>";
        newField +=        "<label for='newField3'>What is the Value></label>";
        newField +=        "<input class='form-control' type='text' name='newField[]' placeholder='$123,000'>";
        newField +=    "</div>";

    $("#newFieldButton").click(function(){

        event.preventDefault();

        $("#fieldContainer").append( newField );

    })
});

</script>

@endsection

@section('script')
    
    @include('partials.jQAutocompleteScriptsFields')

    @include('partials.jQAutocompleteScriptsSigners')

@endsection



