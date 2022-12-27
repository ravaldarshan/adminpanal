@extends('layouts.defualt')
@section('content')
    <h1>{{auth()->user()->first_name}}</h1>
@endsection