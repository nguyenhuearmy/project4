@extends('layouts.app');
@section('content')

<div>
    <h2>CATEGORY</h2>
    @foreach($files as $file)
    <p>{{ $file->name }}</p>
    <a href="{{ url('file/download', $file->id) }}"> {{ $file->link }}</a>
    @endforeach
</div>

@endsection
