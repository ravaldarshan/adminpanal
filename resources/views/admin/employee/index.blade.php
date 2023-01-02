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
                            <h4 class="card-title">Employees</h4>
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Employee Id</th>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Profile Pic</th>
                                <th>Employee Role</th>
                                <th colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (!empty($employees))
                                @foreach ($employees as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->first_name . ' ' . $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        @if ($item->profile_pic)
                                            <td>{{ $item->profile_pic }}</td>
                                        @else
                                            <td>No Image</td>
                                        @endif
                                        <td>{{ $item->geEmployeeRole() }}</td>
                                        <td><a href="{{ route('employees.show', $item->id) }}" style="padding-top: 12px;"
                                                type="button" class="btn btn-outline-primary btn-fw btn-icon display-block"><i
                                                    class="mdi mdi-eye"></i></a></td>
                                        <td><a href="{{ route('employees.edit', $item->id) }}" style="padding-top: 12px;"
                                                type="button" class="btn btn-outline-success btn-fw btn-icon"><i
                                                    class="mdi mdi-table-edit"></i></a></td>
                                        <td>
                                            <form action="{{ route('employees.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger btn-fw btn-icon"
                                                    onclick="return confirm('Are you sure to delete this user?')"><i
                                                        class="mdi mdi-delete-forever"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>
                                        <span class="text-danger">Record Not Found!</span>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-2 pr-3 float-right">
        {{ $employees->links('pagination::bootstrap-4') }}
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
