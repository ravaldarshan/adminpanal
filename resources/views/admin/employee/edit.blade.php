@extends('layouts.defualt')
@section('content')
    <div class="col-lg-12">
        <!-- Breadcrumb -->
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
                <form class="forms-sample" action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" id="exampleInputName1" name="first_name"
                            placeholder="First Name" value="{{ $employees->first_name }}">
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
                            placeholder="last Name" value="{{ $employees->last_name }}">
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
                          <label class="col-sm-3 col-form-label">Gender</label>
                          <div class="col-sm-9">
                            <select class="form-control">
                              <option value="male" >Male</option>
                              <option value="female">Female</option>
                            </select>
                            @error('gender')
                                <span>{{ $message }} </span>
                            @enderror
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Date of Birth</label>
                          <div class="col-sm-9">
                            <input class="form-control" placeholder="dd/mm/yyyy"/>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email"
                            value="{{ $employees->email }}"">
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
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="male" checked>
                                Male
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="female">
                                Female
                              </label>     
                            </div>
                          </div>
                          @error('gender')
                          <span>{{ $message }} </span>
                      @enderror
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Address</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="exampleTextarea1" rows="4" value="{{ $employees->address }}"></textarea>
                          </div>
                          @error('address')
                          <span>{{ $message }} </span>
                      @enderror
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">State</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" />
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
