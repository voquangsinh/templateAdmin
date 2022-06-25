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
            <form action="{{ route('categories.store') }}"  method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      Title: <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                      @if ($errors->has('title'))
                      <span class="text-danger">{{ $errors->first('title') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      Description: <textarea type="text" class="form-control" name="description">{{ old('description') }}</textarea>
                      @if ($errors->has('description'))
                      <span class="text-danger">{{ $errors->first('description') }}</span>
                  @endif
                    </div>
                  </div>
                </div>
                <button class="btn btn-primary" type="submit">Create category</button>
              </form>
        </div>
    </div>
</div>
@endsection