
@extends('layouts.master')
@section('title','Show Uom')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('uoms.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$uom->id}}</td></tr>
		<tr><th>Name</th><td>{{$uom->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
