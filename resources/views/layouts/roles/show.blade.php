@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <a href="{{ route('roles.index') }}" class="btn btn-primary my-3" type="button">View role</a>
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $role->name }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $role->description }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h3>User Permissons</h3>
                        <ul>
                            @foreach ($role->users as $user)
                                <li>{{ $user->name }}</li>
                            @endforeach
                        </ul>
                      </div>
                    </div>
                  </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h3>Permissons</h3>
                        <ul>
                            @foreach ($role->permissions as $permission)
                                <li>{{ $permission->name }}</li>
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