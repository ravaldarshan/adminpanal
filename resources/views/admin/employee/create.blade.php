@section('title', __('Employee'))
@extends('layouts.app')
@section('content')
<!-- Breadcrumb -->
<div class="col-lg-12">
  <nav aria-label="breadcrumb" class="main-breadcrumb ">
      <ol class="breadcrumb  border-0 bg-white">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                  <i class="mdi mdi-home"></i>
              </a></li>
          <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">User</a></li>
          <li class="breadcrumb-item active" aria-current="page">Edit User Profile</li>
      </ol>
  </nav>
</div>
<!-- /Breadcrumb -->
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
      <div class="card-body">
          <h4 class="card-title">Edit Employee Details</h4>
          <form class="forms-sample" action="{{ route('employees.store')}}" method="POST">
              @csrf
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="exampleInputName1" name="first_name"
                                  placeholder="First Name" value="">
                              @error('first_name')
                                  <span>{{ $message }} </span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Last Name</label>
                          <div class="col-sm-9">
                              <input type="text" class="form-control" id="exampleInputName1" name="last_name"
                                  placeholder="last Name" value="">
                              @error('last_name')
                                  <span>{{ $message }} </span>
                              @enderror
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Role As</label>
                          <div class="col-sm-9">
                              <select class="form-control" name="role_as">
                                  <option value="" selected disabled hidden>Select Role</option>
                                  @foreach (auth()->user()->role as $key => $item)
                                      <option value="{{ $key }}" >{{ $item }}</option>
                                  @endforeach
                              </select>
                              @error('role_as')
                                  <span>{{ $message }} </span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Salary*</label>
                        <div class="col-sm-9">
                            <input type="number" name="salary" value=""
                                class="form-control" />
                            @error('salary')
                                <span>{{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                </div>
                  
              </div>
              <div class="row">
                  <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                              <input type="email" class="form-control" id="exampleInputEmail3" name="email"
                                  placeholder="Email" value="">
                              @error('email')
                                  <span>{{ $message }} </span>
                              @enderror
                          </div>
                      </div>
                  </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-4">
                              <div class="form-check">
                                  <label class="form-check-label">
                                      <input type="radio" class="form-check-input" name="gender"
                                          id="membershipRadios1" value="male">
                                      Male
                                  </label>
                              </div>
                            </div>
                            <div class="col-sm-5">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input type="radio" class="form-check-input" name="gender"
                                          id="membershipRadios2" value="female">
                                      Female
                                  </label>
                              </div>
                            </div>
                            @error('gender')
                                <span style="margin-left: 25%;position: absolute;
                                top: 40px;">{{ $message }} </span>
                            @enderror
                      </div>
                    </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password*</label>
                      <div class="col-sm-9">
                          <input type="password" name="password" value=""
                              class="form-control" placeholder="password"/>
                          @error('password')
                              <span>{{ $message }} </span>
                          @enderror
                      </div>
                  </div>
              </div>
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
          </form>
      </div>
  </div>
</div>
@endsection
@section('js')
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
    <script>
        // $('.dob').datepicker();
    </script>
@endsection