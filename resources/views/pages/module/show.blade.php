@extends('layouts.master')
@section('title','Show Module')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('modules.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$module->id}}</td></tr>
		<tr><th>Name</th><td>{{$module->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
