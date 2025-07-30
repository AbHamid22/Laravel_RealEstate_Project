@extends('layouts.master')
@section('title','Manage Progesse')
@section('style')


@endsection
@section('page')
<a href="{{route('progesses.create')}}">New Progesse</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($progesses as $progesse)
		<tr>

			<td>
			<form action = "{{route('progesses.destroy',$progesse->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('progesses.show',$progesse->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('progesses.edit',$progesse->id)}}"> Edit </a>
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
