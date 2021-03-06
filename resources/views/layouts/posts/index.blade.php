@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pd-5">
          @if (session('success'))
                <div class="alert alert-success mt-2" role="alert">
                  {{ session('success') }}
              </div>
          @endif
          @if (session('error'))
                <div class="alert alert-danger mt-2" role="alert">
                  {{ session('error') }}
              </div>
          @endif
          <a href="{{ route('posts.create') }}" class="btn btn-primary my-3" type="button">Create Post</a>
          <div class="table-responsive">
            <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Categories</th>
                    <th scope="col">Author</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($posts as $post)
              <tr>
                <td>
                    {{ $post->id }}
                </td>
                <td>
                    {{ $post->title }}
                </td>
                <td>
                  @foreach ($post->categories as $category)
                    {{ $category->title }} <br>
                  @endforeach
                </td>
                <td>
                  {{ $post->user->name }}
                </td>
                <td>
                  <a href="{{ route('posts.show', ['post' => $post->id]) }}" class="btn btn-primary" type="button">View</a>
                  <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn btn-info" type="button">Edit</a>
                  <form action="{{ route('posts.destroy', ['post' => $post->id]) }}" method="post" style="display:inline-block">
                    @csrf
                    @method('delete')
                    <button  class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        
        </div>
        </div>
    </div>
</div>
@endsection