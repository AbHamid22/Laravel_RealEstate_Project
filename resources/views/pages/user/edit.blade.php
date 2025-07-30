<?php

?>
@extends('layouts.master')
@section('title','Edit User')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('users.index')}}">Manage</a>
<form action="{{route('users.update',$user)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="id" class="col-sm-2 col-form-label">Id</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="id" value="{{$user->id}}" id="id" placeholder="Id">
	</div>
</div>
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$user->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="email" class="col-sm-2 col-form-label">Email</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="email" value="{{$user->email}}" id="email" placeholder="Email">
	</div>
</div>
<div class="row mb-3">
	<label for="password" class="col-sm-2 col-form-label">Password</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="password" value="{{$user->password}}" id="password" placeholder="Password">
	</div>
</div>
<div class="row mb-3">
	<label for="remember_token" class="col-sm-2 col-form-label">Remember Token</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="remember_token" value="{{$user->remember_token}}" id="remember_token" placeholder="Remember Token">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
