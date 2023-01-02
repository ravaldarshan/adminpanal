@extends('layouts.defualt')
@section('title', __('Employee'))
@section('css')

@endsection
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
                <form class="forms-sample" action="{{ route('employees.update', $employees->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="col-sm-9">
                                    <img src="{{ asset('profiles_pic') . '/' . $employees->profile_pic }}"
                                        class="rounded-circle" width="150" height="150" id="preview_image"
                                        onerror=this.src="{{ asset('profiles_pic/face.jpg')}}">
                                    <input type="text" name="old_imgage" value="{{ $employees->profile_pic }}" hidden>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">File upload</label>
                                <div class="col-sm-9">
                                    <input type="file" name="profile_pic" class="file-upload-default" id="imgage" onchange="document.getElementById('preview_image').src = window.URL.createObjectURL(this.files[0])">
                                    <div class="input-group col-xs-12">
                                        <input type="text" class="form-control file-upload-info" disabled
                                            placeholder="Upload Image">
                                        <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary"
                                                type="button">Upload</button>
                                        </span>
                                    </div>
                                    @error('imgage')
                                        <span>{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <label class="col-sm-3 col-form-label">Role As</label>
                                <div class="col-sm-9">
                                    <select class="form-control" name="role_as">
                                        <option value="" selected disabled hidden>Select Role</option>
                                        @foreach (auth()->user()->role as $key => $item)
                                            <option value="{{ $key }}" {{$key == $employees->role_as ? 'selected' : ''}}>{{ $item }}</option>
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
                                <label class="col-sm-3 col-form-label">Date of Birth</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="date" id="dob" name="dob" value="{{$employees->dob}}" placeholder="dd/mm/yyyy" />
                                    @error('dob')
                                        <span>{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Contact</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" name="contact" value="{{$employees->contact}}" placeholder="Contact" />
                                    @error('contact')
                                        <span>{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Alt Contact</label>
                                <div class="col-sm-9">
                                    <input class="form-control" type="number" name="alt_contact" value="{{$employees->alt_contact}}" placeholder="Alt Contact" />
                                    @error('alt_contact')
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
                                        placeholder="Email" value="{{ $employees->email }}"">
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
                                                id="membershipRadios1" value="male" @checked($employees->gender == 'male')>
                                            Male
                                        </label>
                                    </div>
                                    @error('gender')
                                        <span>{{ $message }} </span>
                                    @enderror
                                </div>
                                <div class="col-sm-5">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="gender" @checked($employees->gender == 'female')
                                                id="membershipRadios2" value="female">
                                            Female
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Address</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="address" id="exampleTextarea1" rows="4"
                                        >{{$employees->address }}</textarea>
                                    @error('address')
                                        <span>{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Salary*</label>
                                <div class="col-sm-9">
                                    <input type="number" name="salary" value="{{ $employees->salary }}"
                                        class="form-control" />
                                    @error('salary')
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
