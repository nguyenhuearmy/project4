@extends('layouts.app');
@section('content')

<div class="text-center">
    <h1>Share File</h1>
</div>
<div class="container">
    <div class="col-md-5 col-md-offset-5">
        <form method="GET" action="{{ url('file') }}">
            <input class="form-control" name="searchfile" type="text" placeholder="name file" value="{{ $name }}">
            <button class="btn" type="submit"><span class="glyphicon glyphicon-search"></span></button>
        </form>
    </div>
    <div class="row">
        @foreach($files as $file)
        <div class="col-md-4 col-md-offset-1" style="background-color: #c3e3b5 ; border: 5px white solid">
            <h4><a href="{{ url('file/detail', $file->id) }}">{{ $file->name }}</a></h4>
            <a href="{{ url('file/download', $file->id) }}">{{ $file->link }}</a>
        </div>
        @endforeach
    </div>
</div>

@endsection

