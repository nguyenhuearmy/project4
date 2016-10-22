@extends('layouts.app');
@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading text-center"><h3>Change Profile</h3></div>
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Name</label>
                        <div class="col-md-7">
                            <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Avatar</label>
                        <div class="col-md-7">
                            <input type="file" name="avatar" id="avatar">
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-group">Change Profile</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection