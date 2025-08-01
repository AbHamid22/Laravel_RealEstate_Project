
@extends('layouts.master')
@section('title','Manage Agent')
@section('style')


@endsection
@section('page')
<a class="btn btn-primary" href="{{route('agents.create')}}">New Agent</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Photo</th>
			<th>Name</th>
			<th>Email</th>
			<th>Phone</th>
			<th>Created At</th>
			<th>Updated At</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($agents as $agent)
		<tr>
			<td>{{$agent->id}}</td>
			<td><img src="{{asset('img/'.$agent->photo)}}" width="100" /></td>
			<td>{{$agent->name}}</td>
			<td>{{$agent->email}}</td>
			<td>{{$agent->phone}}</td>
			<td>{{$agent->created_at}}</td>
			<td>{{$agent->updated_at}}</td>

			<td>
			<form action = "{{route('agents.destroy',$agent->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('agents.show',$agent->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('agents.edit',$agent->id)}}"> Edit </a>
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
