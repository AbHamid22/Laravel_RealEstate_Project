@extends('layouts.master')

@section('title','Manage TransactionType')
@section('style')


@endsection
@section('page')
<a href="{{route('transactiontypes.create')}}">New TransactionType</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($transactiontypes as $transactiontype)
		<tr>
			<td>{{$transactiontype->id}}</td>
			<td>{{$transactiontype->name}}</td>

			<td>
			<form action = "{{route('transactiontypes.destroy',$transactiontype->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('transactiontypes.show',$transactiontype->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('transactiontypes.edit',$transactiontype->id)}}"> Edit </a>
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
    {{ $transactiontypes->links('vendor.pagination.bootstrap-4') }}
</div>
@endsection
@section('script')


@endsection
