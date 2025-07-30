
@extends('layouts.master')
@section('title','Show ProductCategory')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('productcategorys.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$productcategory->id}}</td></tr>
		<tr><th>Name</th><td>{{$productcategory->name}}</td></tr>
		<tr><th>Created At</th><td>{{$productcategory->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$productcategory->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
