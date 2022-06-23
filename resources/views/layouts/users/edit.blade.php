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
            <form action="{{ route('users.update', ['user' => $user->id]) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                    </div>
                  </div>
                </div>

                @if ($roles->count())
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      @foreach ($roles as $role)
                        <div class="form-check">
                          <input
                            id="flexCheckCheckedrole{{$role->id}}"
                            class="form-check-input"
                            type="checkbox" value="{{ $role->id }}" 
                            name="roleIds[]" 
                            {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? "checked" : "" }}>
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
                <button class="btn btn-primary" type="submit">Update users</button>
              </form>
        </div>
    </div>
</div>
@endsection