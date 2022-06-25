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
          <a href="{{ route('permissions.create') }}" class="btn btn-primary my-3" type="button">Create Permisison</a>
          <div class="table-responsive">
            <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($permissions as $permission)
              <tr>
                <td>
                    {{ $permission->id }}
                </td>
                <td>
                    {{ $permission->name }}
                </td>
                <td>
                  {{ $permission->description }}
                </td>
                <td>
                  <a href="{{ route('permissions.show', ['permission' => $permission->id]) }}" class="btn btn-primary" type="button">View</a>
                  <a href="{{ route('permissions.edit', ['permission' => $permission->id]) }}" class="btn btn-info" type="button">Edit</a>
                  <form action="{{ route('permissions.destroy', ['permission' => $permission->id]) }}" method="post" style="display:inline-block">
                    @csrf
                    @method('delete')
                    <button  class="btn btn-danger" type="submit">Delete</button>
                  </form>
                </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        {{ $permissions->withQueryString()->links() }}
        </div>
        </div>
    </div>
</div>
@endsection