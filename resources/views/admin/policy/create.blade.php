@extends('layouts.app')
@section('css')
    {{-- select input box js --}}
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endsection
@section('title', __('Policy'))
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
            <form class="forms-sample" action="{{ route('policy.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Policy Title</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputName1" name="policy_title"
                                    placeholder="Policy Title" value="">
                                @error('policy_title')
                                    <span>{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Policy Description</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="exampleInputName1" name="policy_desc"
                                    placeholder="Policy Description" value="">
                                @error('policy_desc')
                                    <span>{{ $message }} </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        {{-- Policy Image --}}
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">File upload</label>
                            <div class="col-sm-9">
                                <input type="file" name="policy_image" class="file-upload-default" id="policy_image" >
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
                          <label class="col-sm-3 col-form-label">Policy Link</label>
                          <div class="col-sm-9">
                              <input type="text" name="policy_link" value=""
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
    {{-- select input box js --}}
    <script src="{{ asset('admin/vendors/typeahead.js/typeahead.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/vendors/select2/select2.min.js') }}"></script>
    <!-- Custom js for this page-->
    <script src="{{ asset('admin/js/file-upload.js') }}"></script>
    <script src="{{ asset('admin/js/select2.js') }}"></script>
    <script src="{{ asset('admin/js/typeahead.js') }}"></script>
@endsection
