@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <a href="{{ route('categories.index') }}" class="btn btn-primary my-3" type="button">View Categories</a>
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $category->title }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea type="text" class="form-control" name="title" disabled>{{ $category->description }}</textarea>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h3>User Roles</h3>
                        <ul>
                            @foreach ($category->posts as $post)
                                <li> <a href="{{ route("posts.show", ['post' => $post->id]) }}">{{ $post->title }}</a></li>
                            @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>

              </form>
        </div>
    </div>
</div>
@endsection