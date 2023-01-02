@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
    <h1>{{auth()->user()->first_name}}</h1>
@endsection