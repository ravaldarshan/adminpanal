@extends('layouts.app')
@section('title', __('Employee'))
@section('css')

@endsection
@section('content')
<!-- Breadcrumb -->
    <div class="col-lg-12">
        <nav aria-label="breadcrumb" class="main-breadcrumb ">
            <ol class="breadcrumb  border-0 bg-white">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-home"></i>
                    </a></li>
                <li class="breadcrumb-item"><a href="{{ route('policy.index') }}">User</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit User Profile</li>
            </ol>
        </nav>
    </div>
    <!-- /Breadcrumb -->
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Policy Details</h4>
                <form class="forms-sample" action="{{ route('policy.update', $policy->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group row">
                            <div class="col-sm-9">
                                <img src="{{ asset('policy_pic') . '/' . $policy->policy_image }}"
                                    class="rounded-circle" width="150" height="150" id="preview_image"
                                    onerror=this.src="{{ asset('profiles_pic/face.jpg')}}">
                                <input type="text" name="old_imgage" value="{{ $policy->policy_image }}" hidden>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                    @error('policy_image')
                                        <span>{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Policy Title</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="exampleInputName1" name="policy_title"
                                        placeholder="Policy Title" value="{{$policy->policy_title}}">
                                    @error('policy_title')
                                        <span>{{ $message }} </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="row">
                    
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Policy Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputName1" name="policy_desc"
                                    placeholder="Policy Description" value="{{$policy->policy_desc}}">
                                @error('policy_desc')
                                    <span>{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Policy Link</label>
                          <div class="col-sm-9">
                              <input type="text" name="policy_link" value="{{$policy->policy_link}}"
                                  class="form-control" placeholder="Policy Link"/>
                              @error('policy_link')
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
