@extends('layouts.app')

@section('content')
<div class="container">
    
    @if(Session::has('message'))
        <div class="alert alert-warning">
            <strong>{{ Session::get('message') }}</strong>
        </div>
    @endif
    
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome</div>

                <div class="panel-body">
                    Your Application's Landing Page.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
