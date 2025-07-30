@extends('layouts.master')
@section('title','Manage ProjectModule')
@section('style')


@endsection
@section('page')
<a href="{{route('projectmodules.create')}}">New ProjectModule</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Project Id</th>
			<th>Module Id</th>
			<th>Duration</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($projectmodules as $projectmodule)
		<tr>
			<td>{{$projectmodule->id}}</td>
			<td>{{$projectmodule->project_id}}</td>
			<td>{{$projectmodule->module_id}}</td>
			<td>{{$projectmodule->duration}}</td>
			<td>{{$projectmodule->created_at}}</td>
			<td>{{$projectmodule->updated_at}}</td>

			<td>
			<form action = "{{route('projectmodules.destroy',$projectmodule->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('projectmodules.show',$projectmodule->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('projectmodules.edit',$projectmodule->id)}}"> Edit </a>
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
    {{ $projectmodules->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
