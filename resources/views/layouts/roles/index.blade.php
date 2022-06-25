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
          <a href="{{ route('roles.create') }}" class="btn btn-primary my-3" type="button">Create role</a>
          <div class="table-responsive">
            <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Permissions</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($roles as $role)
              <tr>
                <td>
                    {{ $role->id }}
                </td>
                <td>
                    {{ $role->name }}
                </td>
                <td>
                  {{ $role->description }}
                </td>
                <td>
                  @foreach ($role->permissions as $permission)
                      {{ $permission->name }} <br>
                  @endforeach
                </td>
                <td>
                  <a href="{{ route('roles.show', ['role' => $role->id]) }}" class="btn btn-primary" type="button">View</a>
                  <a href="{{ route('roles.edit', ['role' => $role->id]) }}" class="btn btn-info" type="button">Edit</a>
                  <form action="{{ route('roles.destroy', ['role' => $role->id]) }}" method="post" style="display:inline-block">
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