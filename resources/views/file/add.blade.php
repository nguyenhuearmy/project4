@extends('layouts.app');
@section('content')

<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="text-center">Add File</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" role='form' method="POST" action="{{ url('/file') }}" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Name File : </label>
                        <div class="col-md-7 {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="name" id="name">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">File : </label>
                        <div class="col-md-7 {{ $errors->has('link') ? ' has-error' : '' }}">
                            <input type="file" name="link" id="link">
                               @if ($errors->has('link'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('link') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 col-md-offset-1">Category</label>
                        <div class="col-md-7 {{ $errors->has('category_id') ? ' has-error' : '' }}">
                            <select class="form-control" name="category_id" id="category_id">
                                <option value=""></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                        </div>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Add File</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

