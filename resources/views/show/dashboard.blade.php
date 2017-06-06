@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Dashboard</h1>
            <h2>{{$transaction->name}}</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading ">
                        <h3 class="panel-title">Property Location</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                            <tr>
                                <td><strong>Address</strong></td>
                                <td>{{$transaction->address1}}</td>
                            </tr>
                            <tr>
                                <td><strong>City, State, Zip</strong></td>
                                <td>{{$transaction->city}}, {{$transaction->state}} &nbsp;&nbsp; {{$transaction->zip}}</td>
                            </tr>
                        </table>
                      </div>
                    </div>
                    
                </div> {{-- col-md-6 --}}

                <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Signers</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                            <th>
                                Name
                            </th>
                            <th>
                                Role
                            </th>
                            @foreach($signers as $signer)
                                <tr>
                                    <td><strong>{{$signer['name']}}</strong></td>
                                    <td>{{$signer['role']}}</td>
                                </tr>
                            @endforeach
                        </table>
                      </div>
                    </div>
                </div> {{-- col md 6 --}}

                <div class="col-md-6">
                    <div class="panel panel-warning">
                      <div class="panel-heading">
                        <h3 class="panel-title">Other Contacts</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                            <th>
                                Name
                            </th>
                            <th>
                                Role
                            </th>
                            <th>
                                Email
                            </th>
                            @foreach($transaction->contacts as $contact)
                                <tr>
                                    <td><strong>{{$contact->name}}</strong></td>
                                    <td>{{$contact->role}}</td>
                                    <td>{{$contact->email}}</td>
                                </tr>
                            @endforeach
                        </table>

                        <a href="{{route('transaction.contact.make')}}"></a>
                      </div>
                    </div>
                </div> {{-- col md 6 --}}

                <div class="col-md-6">

                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">NHD Info</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                          <tr>
                            <td><strong>NHD Provider</strong></td>
                            <td>{{$dashFields['nhd']}}</td>
                          </tr>
                          <tr>
                              <td><strong>Address</strong></td>
                              <td>{{$transaction->address1}}</td>
                          </tr>
                          <tr>
                              <td><strong>City, State, Zip</strong></td>
                              <td>{{$transaction->city}}, {{$transaction->state}} &nbsp;&nbsp; {{$transaction->zip}}</td>
                          </tr>
                        </table>
                      </div>
                    </div>

                </div> {{-- col md 6 --}}

                <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Home Warranty Info</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                          <tr>
                            <td><strong>Home Warranty Company</strong></td>
                            <td>{{$dashFields['hwCompany']}}</td>
                          </tr>
                          <tr>
                            <td><strong>Amount</strong></td>
                            <td>{{$dashFields['hwAmount']}}</td>
                          </tr>
                          <tr>
                            <td><strong>Includes</strong></td>
                            <td>{{$dashFields['hwIncludes']}}</td>
                          </tr>
                          <tr>
                              <td><strong>Address</strong></td>
                              <td>{{$transaction->address1}}</td>
                          </tr>
                          <tr>
                              <td><strong>City, State, Zip</strong></td>
                              <td>{{$transaction->city}}, {{$transaction->state}} &nbsp;&nbsp; {{$transaction->zip}}</td>
                          </tr>
                        </table>
                      </div>
                    </div>
                </div> {{-- col md 6 --}}

                <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Important Dates</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                          @foreach($dashFields['dates'] as $key => $date)
                          <tr>
                            <td><strong>{{$key}}</strong></td>
                            <td>{{$date}}</td>
                          </tr>
                          @endforeach
                        </table>
                      </div>
                    </div>
                </div> {{-- col md 6 --}}

                <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Current Field Values</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table table-striped">
                          <th>
                            Name
                          </th>
                          <th>
                            Value
                          </th>

                          @foreach($fields as $field)
                          <?php $field = $field->sortBy('executed_date')->last(); ?>
                          <tr>
                            <td><strong>{{$field->field->name}}</strong></td>
                            <td>{{$field->value}}</td>
                          </tr>

                          @endforeach
                          
                        </table>
                      </div>
                    </div>
                </div> {{-- col md 6 --}}



            </div> {{-- row --}}
        </div> {{-- col-md-8 col-md-offset-2 --}}
    </div>
</div>
@endsection
