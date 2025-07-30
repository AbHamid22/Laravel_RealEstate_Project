@extends('layouts.master')
@section('title','Show ProjectModule')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectmodules.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$projectmodule->id}}</td></tr>
		<tr><th>Project Id</th><td>{{$projectmodule->project_id}}</td></tr>
		<tr><th>Module Id</th><td>{{$projectmodule->module_id}}</td></tr>
		<tr><th>Duration</th><td>{{$projectmodule->duration}}</td></tr>
		<tr><th>Created At</th><td>{{$projectmodule->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$projectmodule->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
