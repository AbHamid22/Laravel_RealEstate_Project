
@extends('layouts.master')
@section('title','Manage StockAdjustmentType')
@section('style')


@endsection
@section('page')
<a href="{{route('stockadjustmenttypes.create')}}">New StockAdjustmentType</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Factor</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($stockadjustmenttypes as $stockadjustmenttype)
		<tr>
			<td>{{$stockadjustmenttype->id}}</td>
			<td>{{$stockadjustmenttype->name}}</td>
			<td>{{$stockadjustmenttype->factor}}</td>

			<td>
			<form action = "{{route('stockadjustmenttypes.destroy',$stockadjustmenttype->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('stockadjustmenttypes.show',$stockadjustmenttype->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('stockadjustmenttypes.edit',$stockadjustmenttype->id)}}"> Edit </a>
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
