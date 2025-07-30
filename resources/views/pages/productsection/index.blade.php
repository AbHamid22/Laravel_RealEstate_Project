
@extends('layouts.master')
@section('title','Manage ProductSection')
@section('style')


@endsection
@section('page')
<a href="{{route('productsections.create')}}">New ProductSection</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Unit Id</th>
			<th>Photo</th>
			<th>Icon</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($productsections as $productsection)
		<tr>
			<td>{{$productsection->id}}</td>
			<td>{{$productsection->name}}</td>
			<td>{{$productsection->unit_id}}</td>
			<td><img src="{{asset('img/'.$productsection->photo)}}" width="100" /></td>
			<td>{{$productsection->icon}}</td>

			<td>
			<form action = "{{route('productsections.destroy',$productsection->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('productsections.show',$productsection->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('productsections.edit',$productsection->id)}}"> Edit </a>
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
