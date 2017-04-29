@extends('layouts.app')

@section('stylesheet')

    @include('jqthemes.php')

@endsection




@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Check a Form</h1>
            <form method="post" action="{{route('transactionForm.store')}}">
                {{ csrf_field() }}

                  <div class="form-group">
                    <label for="formName">Enter Form Name</label>
                    <input type="text" class="form-control" id="formName" placeholder="Enter Form Name" required>
                  </div>

                {{-- add jquery autocomplete --}}
                <div class="ui-widget">
                      <label for="birds">Birds: </label>
                      <input id="birds">
                    </div>
                     
                    <div class="ui-widget" style="margin-top:2em; font-family:Arial">
                      Result:
                      <div id="log" style="height: 200px; width: 300px; overflow: auto;" class="ui-widget-content"></div>
                    </div>



                    
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    @include('jQAutocompleteScripts.php')

@endsection
