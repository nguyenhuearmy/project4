@extends('layouts.app');
@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        @foreach($files as $file)
        <a style="color: red" href="{{ url('file/detail', $file->id) }}"><h4>{{ $file->name }}</h4></a>
        <a href="{{ url('file/download', $file->id) }}">{{ $file->link }}</a>
        <a href="{{ url('file/delete', $file->id) }}">Delete</a>
        @endforeach
    </div>
</div>

@endsection
