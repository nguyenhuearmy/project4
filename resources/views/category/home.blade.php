@extends('layouts.app');
@section('content')

<div class="container">
    @if(Session::has('message1'))
    <div class="alert alert-warning">{{ Session::get('message1') }}</div>
    @endif
    <div class="text-center"><h3>Category</h3></div>
    
    <div class="col-md-6 col-md-offset-6">
        <form class="form-inline" method="get" action="{{ url('/category')}}">
            <div class="form-group">
                <label class="col-md-2">Name </label>
                <div class="col-md-7">
                    <input class="form-control" type="text" name='name' id='name'>
                </div>
                <div class="col-md-3"><button type="submit" class="btn btn-success">Add</button></div>
            </div>
            
        </form>
    </div>
    
    <div>
        @foreach($categories as $row)
            <a href="{{ url('/category', $row->id)}}"><h4>{{ $row->name }}</h4></a>
            <a href="{{ url('category/delete', $row->id) }}">Delete</a>
        @endforeach
    </div>
    
</div>

@endsection