@extends('layouts.app')

@section('stylesheet')

    @include('partials.jqthemes')

@endsection




@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Check a Form</h1>
            <form method="post" action="{{route('transactionForm.store')}}">
                {{ csrf_field() }}

                {{-- add jquery autocomplete --}}
                <div class="ui-widget">
                      <label for="form">Form: </label>
                      <input name="form" id="form">
                </div>

                <button type="submit" class="btn btn-default pull-right">Submit</button>
                
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
    
    @include('partials.jQAutocompleteScripts')

@endsection

