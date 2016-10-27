@extends('layouts.app');
@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h2 class="text-center">Edit File</h2>
            </div>
            
            <div class="panel-body">
                <form class="form-horizontal" method="POST" action="{{ url('file/edit') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div>
                        <input value="{{ $file->id }}" type="hidden" name="id">
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Name </label>
                        <div class="col-md-7">
                            <input type="text" class="form-control" name="name" value="{{ $file->name }}">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">File </label>
                        <div class="col-md-7">
                            <input type="file" name="link">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Category</label>
                        <div class="col-md-7">
                            <select class="form-control" name="category_id">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection


