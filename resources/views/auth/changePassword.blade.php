@extends('layouts.app');
@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            
            <div class="panel-heading text-center">
                <h3>Change Password</h3>
            </div>
            
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ url('change') }}">
                     {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Password</label>
                        <div class="col-md-7">
                            <input type="password" name="password" class="form-control" id='password'>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            
                                @if(Session::has('message2'))
                                <span class="help-block">
                                    <strong>{{ Session::get('message2') }}</strong>
                                </span>
                                @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">New Password</label>
                        <div class="col-md-7">
                            <input type="password" name="new_password" class="form-control" id='new_password'>
                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Confirmation Password</label>
                        <div class="col-md-7">
                            <input type="password" name="confirm_password" class="form-control" id='confirm_password'>
                                @if ($errors->has('confirm_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirm_password') }}</strong>
                                    </span>
                                @endif
                            
                            @if(Session::has('message1'))
                            <span class="help-block">
                                <strong>{{ Session::get('message1') }} </strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                     <div class="text-center">
                        <button type="submit" class="btn btn-success">Change Password</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection