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
            <form action="{{ route('posts.store') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title">
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
                      <textarea class="form-control" name="content" rows="10"></textarea>
                      @if ($errors->has('content'))
                      <span class="text-danger">{{ $errors->first('content') }}</span>
                  @endif
                    </div>
                  </div>
                </div>

                @if ($categories->count())
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      @foreach ($categories as $category)
                        <div class="form-check">
                          <input id="flexCheckCheckedcategory{{$category->id}}" class="form-check-input" 
                          type="checkbox" value="{{ $category->id }}" name="categoryIds[]">
                          <label class="form-check-label" for="flexCheckCheckedcategory{{$category->id}}">
                            {{ $category->title }}
                          </label>
                        </div>
                      @endforeach
                      @if ($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                @endif
                <button class="btn btn-primary" type="submit">Create Posts</button>
              </form>
        </div>
    </div>
</div>
@endsection