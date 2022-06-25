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
            <form action="{{ route('users.store') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      Name: <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      Email: <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                      @if ($errors->has('email'))
                      <span class="text-danger">{{ $errors->first('email') }}</span>
                  @endif
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      Password: <input type="password" class="form-control" name="password">
                      @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      Confirm passwod: <input type="password" class="form-control" name="password_confirmation">
                      @if ($errors->has('password'))
                      <span class="text-danger">{{ $errors->first('password') }}</span>
                  @endif
                    </div>
                  </div>
                </div>

                @if ($roles->count())
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      Roles: 
                      @foreach ($roles as $role)
                        <div class="form-check">
                          <input
                            id="flexCheckCheckedrole{{$role->id}}"
                            class="form-check-input"
                            type="checkbox" value="{{ $role->id }}" 
                            name="roleIds[]">
                          <label class="form-check-label" for="flexCheckCheckedrole{{$role->id}}">
                            {{ $role->name }}
                          </label>
                        </div>
                      @endforeach
                      @if ($errors->has('roleIds'))
                      <span class="text-danger">{{ $errors->first('roleIds') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                @endif
                <button class="btn btn-primary" type="submit">Create users</button>
              </form>
        </div>
    </div>
</div>
@endsection