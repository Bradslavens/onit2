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
                        <table class="table">
                            <tr>
                                <td>Address 1:</td>
                                <td>{{$transaction->address1}}</td>
                            </tr>
                            <tr>
                                <td>City, State, Zip:</td>
                                <td>{{$transaction->city}}, {{$transaction->state}} &nbsp;&nbsp; {{$transaction->zip}}</td>
                            </tr>
                        </table>
                      </div>
                    </div>
                    
                </div> {{-- col-md-6 --}}

                <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Signers / Contacts</h3>
                      </div>
                      <div class="panel-body">
                        <table class="table">
                            <th>
                                Name
                            </th>
                            <th>
                                Role
                            </th>
                            @foreach($signers as $signer)
                                <tr>
                                    <td>{{$signer['name']}}</td>
                                    <td>{{$signer['role']}}</td>
                                </tr>
                            @endforeach
                        </table>
                      </div>
                    </div>
                </div> {{-- col md 4 --}}

                    <div class="col-md-6">

                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">NHD Info</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>
                </div> {{-- col md 4 --}}

                    <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Homew Warranty Info</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>
                </div> {{-- col md 4 --}}

                    <div class="col-md-6">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                        <h3 class="panel-title">Important Dates</h3>
                      </div>
                      <div class="panel-body">
                        Panel content
                      </div>
                    </div>
                </div> {{-- col md 4 --}}
            </div> {{-- row --}}
        </div> {{-- col-md-8 col-md-offset-2 --}}
    </div>
</div>
@endsection
