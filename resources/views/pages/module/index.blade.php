@extends('layouts.master')
@section('title','Manage Module')
@section('style')


@endsection
@section('page')
<a href="{{route('modules.create')}}">New Module</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($modules as $module)
		<tr>
			<td>{{$module->id}}</td>
			<td>{{$module->name}}</td>

			<td>
			<form action = "{{route('modules.destroy',$module->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('modules.show',$module->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('modules.edit',$module->id)}}"> Edit </a>
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
