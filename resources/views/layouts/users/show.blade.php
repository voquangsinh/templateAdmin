@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 my-3">
            <a href="{{ route('permissions.index') }}" class="btn btn-primary my-3" type="button">View Permission</a>
            <form>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $permission->name }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="{{ $permission->description }}" disabled>
                    </div>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <h3>User Permisson</h3>
                        <ul>
                            @foreach ($permission->roles as $role)
                                <li>{{ $role->name }}</li>
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