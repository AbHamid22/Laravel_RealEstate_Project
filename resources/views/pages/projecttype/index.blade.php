@extends('layouts.master')
@section('title','Manage ProjectType')
@section('style')


@endsection
@section('page')
<a href="{{route('projecttypes.create')}}">New ProjectType</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($projecttypes as $projecttype)
		<tr>
			<td>{{$projecttype->id}}</td>
			<td>{{$projecttype->name}}</td>

			<td>
			<form action = "{{route('projecttypes.destroy',$projecttype->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('projecttypes.show',$projecttype->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('projecttypes.edit',$projecttype->id)}}"> Edit </a>
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
    {{ $projecttypes->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
