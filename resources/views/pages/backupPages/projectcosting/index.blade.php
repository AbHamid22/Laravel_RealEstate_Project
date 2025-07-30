@extends('layouts.master')
@section('title','Manage ProjectCosting')
@section('style')


@endsection
@section('page')
<a href="{{route('projectcostings.create')}}">New ProjectCosting</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Project</th>
			<th>Module</th>
			<th>Budget</th>
			<th>Actual Cost</th>
			<th>Days</th>
			<th>Created At</th>
			<!-- <th>Updated At</th> -->

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($projectcostings as $projectcosting)
		<tr>
			<td>{{$projectcosting->id}}</td>
			<td>{{$projectcosting->project->name ?? 'N/A' }}</td>
			<td>{{$projectcosting->module->name ?? 'N/A' }}</td>
			<td>{{$projectcosting->budget}}</td>
			<td>{{$projectcosting->actual_cost}}</td>
			<td>{{$projectcosting->days}}</td>
			<td>{{$projectcosting->created_at}}</td>
			<!-- <td>{{$projectcosting->updated_at}}</td> -->

			<td>
				<form action="{{route('projectcostings.destroy',$projectcosting->id)}}" method="post">
					<a class='btn btn-primary' href="{{route('projectcostings.show',$projectcosting->id)}}">View</a>
					<a class='btn btn-success' href="{{route('projectcostings.edit',$projectcosting->id)}}"> Edit </a>
					@method('DELETE')
					@csrf
					<input type="submit" class="btn btn-danger" name="delete" value="Delete" />
				</form>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('script')


@endsection