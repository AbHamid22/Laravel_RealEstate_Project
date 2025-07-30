@extends('layouts.master')
@section('title','Manage Vendor')
@section('style')


@endsection
@section('page')
<a href="{{route('vendors.create')}}">New Vendor</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Email</th>
			<th>Address</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($vendors as $vendor)
		<tr>
			<td>{{$vendor->id}}</td>
			<td><img src="{{asset('img/'.$vendor->photo)}}" width="100" /></td>
			<td>{{$vendor->name}}</td>
			<td>{{$vendor->mobile}}</td>
			<td>{{$vendor->email}}</td>
			<td>{{$vendor->address}}</td>

			<td>
			<form action = "{{route('vendors.destroy',$vendor->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('vendors.show',$vendor->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('vendors.edit',$vendor->id)}}"> Edit </a>
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
    {{ $vendors->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
