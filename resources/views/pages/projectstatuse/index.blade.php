@extends('layouts.master')
@section('title','Manage ProjectStatuse')
@section('style')


@endsection
@section('page')
<a href="{{route('projectstatuses.create')}}">New ProjectStatuse</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($projectstatuses as $projectstatuse)
		<tr>
			<td>{{$projectstatuse->id}}</td>
			<td>{{$projectstatuse->name}}</td>

			<td>
			<form action = "{{route('projectstatuses.destroy',$projectstatuse->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('projectstatuses.show',$projectstatuse->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('projectstatuses.edit',$projectstatuse->id)}}"> Edit </a>
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
    {{ $projectstatuses->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
