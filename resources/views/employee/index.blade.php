@extends('layouts.defualt')
@section('content')
<div class="col-lg-12  stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Employees</h4>
        <div class="text-right mr-2">
          <a href="#" style="background-color: blue;
          padding: 11px;
          border-radius: 12px;
          color: white;" type="button"><i class="mdi mdi-eye"></i>Add Employee</a>
        </div>
        @if (session('message')) 
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('message')}}
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
                @if(!empty($employees))
                @foreach ($employees as $key => $item)    
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name.' '.$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    @if ($item->profile_pic)
                    <td>{{$item->profile_pic}}</td>
                    @else
                    <td>No Image</td>
                    @endif
                    <td>{{$item->getrole()}}</td>
                    <td><a href="{{route('employees.show',$item->id)}}" style="padding-top: 12px;" type="button" class="btn btn-primary btn-icon display-block"><i class="mdi mdi-eye"></i></a></td>
                    <td><a href="{{route('employees.edit',$item->id)}}" style="padding-top: 12px;" type="button" class="btn btn-success btn-icon"><i class="mdi mdi-table-edit"></i></a></td>
                    <td><form action="{{ route('employees.destroy', $item->id ) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-inverse-danger btn-icon" onclick="return confirm('Are you sure to delete this user?')"><i class="mdi mdi-delete-forever"></i></button>
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