
@extends('layouts.master')
@section('title','Manage ProductUnit')
@section('style')


@endsection
@section('page')
<a href="{{route('productunits.create')}}">New ProductUnit</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($productunits as $productunit)
		<tr>
			<td>{{$productunit->id}}</td>
			<td>{{$productunit->name}}</td>

			<td>
			<form action = "{{route('productunits.destroy',$productunit->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('productunits.show',$productunit->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('productunits.edit',$productunit->id)}}"> Edit </a>
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
