
@extends('layouts.master')
@section('title','Manage Statu')
@section('style')


@endsection
@section('page')
<a href="{{route('status.create')}}">New Statu</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($status as $statu)
		<tr>
			<td>{{$statu->id}}</td>
			<td>{{$statu->name}}</td>

			<td>
			<form action = "{{route('status.destroy',$statu->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('status.show',$statu->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('status.edit',$statu->id)}}"> Edit </a>
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
