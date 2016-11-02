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
        <?php foreach($files as $file){ $thich = 0;?>
        <div class="col-md-4 col-md-offset-1" style="background-color: #c3e3b5 ; border: 5px white solid">
            <h4><a href="{{ url('file/detail', $file->id) }}">{{ $file->name }}</a></h4>
            <a href="{{ url('file/download', $file->id) }}">{{ $file->link }}</a>
            
            <?php foreach($likes as $like) {   
                if($like->file_id == $file->id){
                    $thich = 1; break; 
                }
            }  ?>
            
            <?php if($thich==1){ ?>
                <form method="post" action="{{ url('dislike') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }} ">
                    <input type="hidden" name="file_id" value="{{ $file->id }}">
                    <button type="submit" class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-thumbs-down" ></span> DisLike</button>
                </form>
            <?php } ?>
            
            <?php if($thich==0){ ?>
                <form method="post" action="{{ url('like') }}">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user_id" value="{{ \Auth::user()->id }} ">
                    <input type="hidden" name="file_id" value="{{ $file->id }}">
                    <button type="submit" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-thumbs-up"></span> Like</button>
                </form>
        <?php } }?>
        </div>
        
    </div>
</div>

@endsection

