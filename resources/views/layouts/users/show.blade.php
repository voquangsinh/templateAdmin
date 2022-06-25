@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <a href="{{ route('permissions.index') }}" class="btn btn-primary my-3" type="button">View User</a>
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $user->name }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $user->email }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h3>User Roles</h3>
                        <ul>
                            @foreach ($user->roles as $role)
                                <li> <a href="{{ route("roles.show", ['role' => $role->id]) }}">{{ $role->name }}</a></li>
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