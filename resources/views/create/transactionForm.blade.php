@extends('layouts.app')

@section('stylesheet')

    @include('partials.jqthemes')

@endsection




@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Check a Form</h1>
            <form method="post" action="{{route('transactionformfieldscreate')}}">
                {{ csrf_field() }}

                    {{-- add jquery autocomplete --}}
                    <div class="ui-widget form-group">
                          <label for="form">Form: </label>
                          <input class="form-control" name="form" id="form">
                    </div>

                <input type="hidden" name="transaction" value="{{$transaction}}">

                <div class="form-group">
                    
                    <button type="submit" class="btn btn-default pull-right">Submit</button>

                </div>
                
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    @include('partials.jQAutocompleteScripts')

@endsection

