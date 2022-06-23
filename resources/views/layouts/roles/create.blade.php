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

            @if (!$permissions->count())
              <div class="alert alert-danger" role="alert">
                 Chưa có Permissions nào được thêm vào. Vui lòng tạo 1 permission trước khi tạo Roles. <a href="{{ route('permissions.create') }}"> Click here </a>
              </div>
            @endif
            <form action="{{ route('roles.store') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="name" value="{{ old('name') }}" {{ !$permissions->count() ? 'disabled' : '' }}>
                      @if ($errors->has('name'))
                      <span class="text-danger">{{ $errors->first('name') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" name="description" rows="10"  {{ !$permissions->count() ? 'disabled' : '' }}>{{ old('description') }}</textarea>
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
                          <input id="flexCheckCheckedPermission{{$permission->id}}" class="form-check-input" type="checkbox" value="{{ $permission->id }}" name="permissionIds[]">
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
                <button class="btn btn-primary" type="submit" {{ !$permissions->count() ? 'disabled' : '' }}>Create Permissions</button>
              </form>
        </div>
    </div>
</div>
@endsection