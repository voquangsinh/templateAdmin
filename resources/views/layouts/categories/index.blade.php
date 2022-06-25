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
          <a href="{{ route('categories.create') }}" class="btn btn-primary my-3" type="button">Create User</a>
          <div class="table-responsive">
            <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Count posts</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($categories as $category)
              <tr>
                <td>
                    {{ $category->id }}
                </td>
                <td>
                    {{ $category->title }}
                </td>
                <td>
                    {{ $category->posts->count() }}
                </td>
                <td>
                  <a href="{{ route('categories.show', ['category' => $category->id]) }}" class="btn btn-primary" type="button">View</a>
                  <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-info" type="button">Edit</a>
                  <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="post" style="display:inline-block">
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