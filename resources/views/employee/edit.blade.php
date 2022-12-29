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
                        <label for="exampleInputName1" class="col-sm-3 col-form-label">First Name*</label>
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
                      <label for="exampleInputName1" class="col-sm-3 col-form-label">Last Name*</label>
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
                    <div class="form-group">
                        <label for="exampleInputEmail3">Email*</label>
                        <input type="email" class="form-control" id="exampleInputEmail3" name="email" placeholder="Email"
                            value="{{ $employees->email }}"">
                        @error('email')
                            <span>{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleSelectGender">Gender*</label>
                        <select class="form-control" id="exampleSelectGender">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        @error('gender')
                            <span>{{ $message }} </span>
                        @enderror
                    </div>
                    @if ($employees->profile_pic)
                        <div class="m-2">
                            <img src="{{ asset('admin/images/faces') . '/' . $employees->profile_pic }}" class="rounded-circle"
                                width="120" onerror=this.src="{{ asset('admin/images/faces/face.jpg') }}">
                        </div>
                    @endif
                    <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="imgage" class="file-upload-default">
                        <div class="input-group col-xs-12">
                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                            <span class="input-group-append">
                                <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                            </span>
                        </div>
                        @error('imgage')
                            <span>{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="credits">Credits</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="credits"
                            value="{{ $employees->credits }}">
                        @error('credits')
                            <span>{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="salary">Salary</label>
                        <input type="number" class="form-control" id="exampleInputCity1" placeholder="address"
                            value="{{ $employees->salary }}">
                        @error('address')
                            <span>{{ $message }} </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleTextarea1">Address</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" value="{{ $employees->address }}"></textarea>
                        @error('address')
                            <span>{{ $message }} </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    {{-- <button class="btn btn-light">Cancel</button> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
