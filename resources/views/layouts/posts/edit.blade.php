@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('posts.update', ['post' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{$post->title}}">
                      @if ($errors->has('title'))
                      <span class="text-danger">{{ $errors->first('title') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="file" class="form-control" name="thumbnail">
                      @if ($errors->has('thumbnail'))
                      <span class="text-danger">{{ $errors->first('thumbnail') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="content" rows="10">{{$post->content}}</textarea>
                      @if ($errors->has('content'))
                      <span class="text-danger">{{ $errors->first('content') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Update Posts</button>
              </form>
        </div>
    </div>
</div>
@endsection