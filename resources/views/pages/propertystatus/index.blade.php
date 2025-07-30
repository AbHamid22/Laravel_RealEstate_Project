
@extends('layouts.master')
@section('title','Manage Statuse')
@section('style')


@endsection
@section('page')
<a href="{{route('propertystatuses.create')}}">New Statuse</a>
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
	@foreach($statuses as $status)
		<tr>
			<td>{{$status->id}}</td>
			<td>{{$status->name}}</td>
			<td>{{$status->created_at}}</td>
			<td>{{$status->updated_at}}</td>

			<td>
			<form action = "{{route('propertystatuses.destroy',$status->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('propertystatuses.show',$status->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('propertystatuses.edit',$status->id)}}"> Edit </a>
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
    {{ $propertystatuses->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
