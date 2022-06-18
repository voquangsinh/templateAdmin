@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 pd-5">
            <form>
                <div class="row mt-8">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Regular" class="form-control" disabled />
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group mb-4">
                        <div class="input-group-prepend">
                          <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <div class="input-group mb-4">
                        <input class="form-control" placeholder="Birthday" type="text">
                        <div class="input-group-append">
                          <span class="input-group-text"><i class="ni ni-zoom-split-in"></i></span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group has-success">
                      <input type="text" placeholder="Success" class="form-control is-valid" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group has-danger">
                      <input type="email" placeholder="Error Input" class="form-control is-invalid" />
                    </div>
                  </div>
                </div>
              </form>
        </div>
    </div>
</div>
@endsection