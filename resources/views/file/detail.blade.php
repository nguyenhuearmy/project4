@extends('layouts.app');
@section('content')

<div class="col-md-8 col-md-offset-2">
    <h4>{{ $file->name }}</h4>
    @if(\Auth::user()->id == $file->user_id)
        <a href="{{ url('file/edit', $file->id) }}">Edit file</a><br>
    @endif
    <a href="{{ url('file/download', $file->id) }}">{{ $file->link }}</a><br>
    @for($i=0; $i<count($result); $i++)
        <div class="row">
            <div class="col-md-4">
                <p>{{ $result[$i][0] }}</p>
                <img src="{{ asset('images/'. $result[$i][1]) }}" width="50px" height="50px" class="img-circle">
            </div>
            <div class="col-md-8">
                <p>{{ $result[$i][2] }}</p>
            </div>
        </div> 
    @endfor
</div>

<div class="col-md-6 col-md-offset-2">
    <img src="{{ asset('images/'. Auth::user()->avatar) }}" width="50px" height="50px" class="img-circle">
    <form method="POST" action="{{ url('comment')}}">
        {!! csrf_field() !!}
        <input name="file" value="{{ $file->id}}" type="hidden">
        <input name="content" class="form-control" placeholder="comments">
        <input type="submit" value="Gửi">
    </form>
</div>

@endsection

