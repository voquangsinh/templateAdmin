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
            <form action="{{ route('roles.update', ['role' => $role->id]) }}"  method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}">
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="description" rows="10">{{ old('description', $role->description) }}</textarea>
                      @if ($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                @if ($permissions->count())
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      @foreach ($permissions as $permission)
                        <div class="form-check">
                          <input id="flexCheckCheckedPermission{{$permission->id}}" class="form-check-input" 
                          type="checkbox" value="{{ $permission->id }}" name="permissionIds[]"
                          {{ in_array($permission->id, $role->permissions->pluck('id')->toArray()) ? "checked" : "" }}>
                          <label class="form-check-label" for="flexCheckCheckedPermission{{$permission->id}}">
                            {{ $permission->name }}
                          </label>
                        </div>
                      @endforeach
                      @if ($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                @endif
                <button class="btn btn-primary" type="submit">Update Role</button>
              </form>
        </div>
    </div>
</div>
@endsection