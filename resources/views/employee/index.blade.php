@extends('layouts.defualt')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Employees</h4>
        @if (session('message'))    
        <p class="card-description">
            {{$message}}
        </p>
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
                @if(count($employees)> 0)
                @foreach ($employees as $key => $item)    
                <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$item->id}}</td>
                    <td>{{$item->first_name.' '.$item->last_name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->profile_pic}}</td>
                    <td>{{$item->role_as}}</td>
                    <td><a href="{{route('employees.show',$item->id)}}"  type="button" class="btn btn-primary"><i class="mdi mdi-eye"></i></a></td>
                    <td><a href="{{route('employees.edit',$item->id)}}" type="button" class="btn btn-success"><i class="mdi mdi-table-edit"></i></a></td>
                    <td><form action="{{ route('employees.destroy', $item->id ) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class=" btn btn-danger" onclick="return confirm('Are you sure to delete this user?')"><i class="mdi mdi-delete-forever"></i></button>
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
            <div class="mt-2 float-right">
            {{ $employees->links('pagination::bootstrap-4') }}
            </div>
      </div>
    </div>
  </div>
@endsection