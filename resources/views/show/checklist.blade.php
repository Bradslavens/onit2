@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>Checklist</h1>
            
            <form method="POST" action="{{route('checklist.store')}}">
                {{ csrf_field() }}
                <table class="table">
                    @foreach($checklistItems as $formName => $checklistItem)
                        <tr><td>{{$formName}}</td></tr>
                        @foreach($checklistItem as $form)
                            <tr><td>{{$form['name']}}</td></tr>
                            <tr><td>{{$form['role']}}</td></tr>
                            <tr><td>{{$form['id']}}</td></tr>
                            <tr><td>{{$form['status']}}</td></tr>
                        @endforeach
                    @endforeach
                </table>

                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
