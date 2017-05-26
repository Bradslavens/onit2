@extends('layouts.app')

@section('stylesheet')

    @include('partials.jqthemes')

@endsection




@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
              Add Form
            </button>

            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Add A Form</h4>
                  </div>
                  <div class="modal-body">
                    <form method="POST" action="{{route('transaction.form.store')}}">
                        {{ csrf_field() }}

                      <div class="form-group">
                        <label for="form">Form Name</label>
                        <input type="text" class="form-control" id="form" name="form" placeholder="Use the Format: RPA - Residential Purchase Agreement :)">
                      </div>

                      <input type="hidden" name="transaction_id" value="{{$transaction->id}}">

                        <button type="submit" class="btn btn-default">Add Form</button>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal -->

        </div> {{-- col-md-8 col-md-offset-2 --}}

    </div>
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

