@extends('layouts.defualt')
@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
       <table>
        <tbody>
          @if(count($employees)> 0)
          @foreach ($employees as $item) 
          <tr>
            <td>Employee Id: {{$item->id}}</td>
          </tr>
          <tr>
            <td>First Name: <input type="text" value="{{$item->first_name}}" disabled></td>
          </tr>
          <tr>
            <td>Last Name: {{$item->last_name}}</td>
          </tr> 
          <tr>
            <td>Gender: {{$item->gender}}</td>
          </tr> 
          <tr>
            <td>Email: {{$item->email}}</td>
          </tr> 
          <tr>
            <td>Role: {{$item->role_as}}</td>
          </tr> 
          <tr>
            <td>DOB: {{$item->dob}}</td>
          </tr> 
          <tr>
            <td>contact: {{$item->contact}}</td>
          </tr> 
          <tr>
            <td>address: {{$item->address}}</td>
          </tr> 
          <tr>
            <td>profile_pic: {{$item->profile_pic}}</td>
          </tr> 
          <tr>
            <td>credits: {{$item->credits}}</td>
          </tr> 
          <tr>
            <td>salary: <input type="text" value="{{$item->salary}}" disabled></td>
          </tr> 
          <tr>
            <td>created_at: {{$item->created_at}}</td>
          </tr> 
          @endforeach
          @else
          <td>No Recode Found!</td>
          @endif
        </tbody>
      </table>
      <a href="{{route('employees.index')}}"  type="button" class="btn btn-primary mt-2">Back To Home</a>
      </div>
    </div>
  </div>
@endsection