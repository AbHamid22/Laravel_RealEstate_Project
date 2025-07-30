
@extends('layouts.master')
@section('title','Manage ProductCategory')
@section('style')


@endsection
@section('page')
<a href="{{route('productcategorys.create')}}">New ProductCategory</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($productcategorys as $productcategory)
		<tr>
			<td>{{$productcategory->id}}</td>
			<td>{{$productcategory->name}}</td>
			<td>{{$productcategory->created_at}}</td>
			<td>{{$productcategory->updated_at}}</td>

			<td>
			<form action = "{{route('productcategorys.destroy',$productcategory->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('productcategorys.show',$productcategory->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('productcategorys.edit',$productcategory->id)}}"> Edit </a>
				@method('DELETE')
				@csrf
				<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
			</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
@endsection
@section('script')


@endsection
