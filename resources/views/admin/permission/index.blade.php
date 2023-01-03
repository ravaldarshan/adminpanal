@extends('layouts.app')
@section('css')
    {{-- select input box js --}}
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/vendors/select2-bootstrap-theme/select2-bootstrap.min.css') }}">
@endsection
@section('title', __('Employee'))
@section('content')
    <div class="col-lg-12  stretch-card">
        <div class="card">
            <div class="card-body">
                
                <div class="d-flex mb-2" style="justify-content: space-between;">
                    <div class="text-left">
                            <h4 class="card-title">Permissions</h4>
                            {{-- <form action="{{ route('employees.index') }}" method="POST">
                                <label>Filter</label>
                                <select class="js-example-basic-multiple w-30 p-0" multiple="multiple">
                                    @foreach ($role as $key => $item)
                                        <option value="{{ $key }}">{{ $item }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-inverse-info btn-icon-text"> <i
                                        class="mdi mdi-filter"></i>Filter</button>
                            </form> --}}
                        </div>
                        <div class="text-right">
                            <form action="{{ route('employees.create') }}">
                                <button type="submit" class="btn btn-outline-primary btn-fw">Add Employee</button>
                            </form>
                        </div>
                </div>
                @if (session('message'))
                    <div class="alert alert-danger alert-dismissible fade show mt-2 mb-2" role="alert">
                        {{ session('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="mdi mdi-close-circle"></i></span>
                        </button>
                    </div>
                @elseif(session('success'))
                <div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="mdi mdi-close-circle"></i></span>
                    </button>
                </div>
                @endif
               {{-- hear --}}
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
