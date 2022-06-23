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
          <a href="{{ route('users.create') }}" class="btn btn-primary my-3" type="button">Create role</a>
          <div class="table-responsive">
            <table class="table align-items-center">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
              <tr>
                <td>
                    {{ $user->id }}
                </td>
                <td>
                    {{ $user->name }}
                </td>
                <td>
                    {{ $user->email }}
                </td>
                <td>
                  @foreach ($user->roles as $role)
                    {{ $role->name }} <br> 
                  @endforeach
                </td>
                <td>
                  <a href="{{ route('users.show', ['user' => $user->id]) }}" class="btn btn-primary" type="button">View</a>
                  <a href="{{ route('users.edit', ['user' => $user->id]) }}" class="btn btn-info" type="button">Edit</a>
                  <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="post" style="display:inline-block">
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