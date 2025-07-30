@extends('layouts.master')
@section('title','Show ProjectType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projecttypes.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$projecttype->id}}</td></tr>
		<tr><th>Name</th><td>{{$projecttype->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
