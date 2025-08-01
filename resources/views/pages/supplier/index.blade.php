
@extends('layouts.master')
@section('title','Manage Supplier')
@section('style')


@endsection
@section('page')
<a href="{{route('suppliers.create')}}">New Supplier</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Photo</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($suppliers as $supplier)
		<tr>
			<td>{{$supplier->id}}</td>
			<td>{{$supplier->name}}</td>
			<td>{{$supplier->mobile}}</td>
			<td>{{$supplier->email}}</td>
			<td><img src="{{asset('img/'.$supplier->photo)}}" width="100" /></td>

			<td>
			<form action = "{{route('suppliers.destroy',$supplier->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('suppliers.show',$supplier->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('suppliers.edit',$supplier->id)}}"> Edit </a>
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
