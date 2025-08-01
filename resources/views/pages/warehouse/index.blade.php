
@extends('layouts.master')
@section('title','Manage Warehouse')
@section('style')


@endsection
@section('page')
<a href="{{route('warehouses.create')}}">New Warehouse</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>City</th>
			<th>Contact</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($warehouses as $warehouse)
		<tr>
			<td>{{$warehouse->id}}</td>
			<td>{{$warehouse->name}}</td>
			<td>{{$warehouse->city}}</td>
			<td>{{$warehouse->contact}}</td>

			<td>
			<form action = "{{route('warehouses.destroy',$warehouse->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('warehouses.show',$warehouse->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('warehouses.edit',$warehouse->id)}}"> Edit </a>
				@method('DELETE')
				@csrf
				<input type = "submit" class="btn btn-danger" name = "delete" value = "Delete" />
			</form>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>
<div class="d-flex justify-content-center mt-2">
    {{ $warehouses->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
