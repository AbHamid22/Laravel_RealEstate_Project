@extends('layouts.master')
@section('title','Show ProjectStatuse')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectstatuses.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$projectstatuse->id}}</td></tr>
		<tr><th>Name</th><td>{{$projectstatuse->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
