@extends('layouts.app');
@section('content')

<div class="container">
    @foreach($categories as $category)
    <a href="{{ url('category', $category->id) }}">{{ $category->name }}</a>
    @endforeach
</div>

@endsection
