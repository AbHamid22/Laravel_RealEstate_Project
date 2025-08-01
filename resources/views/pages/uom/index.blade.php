
@extends('layouts.master')
@section('title','Manage Uom')
@section('style')


@endsection
@section('page')
<a href="{{route('uoms.create')}}">New Uom</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($uoms as $uom)
		<tr>
			<td>{{$uom->id}}</td>
			<td>{{$uom->name}}</td>

			<td>
			<form action = "{{route('uoms.destroy',$uom->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('uoms.show',$uom->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('uoms.edit',$uom->id)}}"> Edit </a>
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
    {{ $uoms->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
