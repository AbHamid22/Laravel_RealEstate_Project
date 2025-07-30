@extends('layouts.master')
@section('title','Manage Company')
@section('style')


@endsection
@section('page')
<a href="{{route('companys.create')}}">New Company</a>
<table class="table table-hover text-nowrap">
	<thead>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Mobile</th>
			<th>Bin</th>
			<th>Email</th>
			<th>Website</th>
			<th>City</th>
			<th>Area</th>
			<th>Street Address</th>
			<th>Post Code</th>
			<th>Inactive</th>
			<th>Logo</th>

			<th>Action</th>
		</tr>
	</thead>
	<tbody>
	@foreach($companys as $company)
		<tr>
			<td>{{$company->id}}</td>
			<td>{{$company->name}}</td>
			<td>{{$company->mobile}}</td>
			<td>{{$company->bin}}</td>
			<td>{{$company->email}}</td>
			<td>{{$company->website}}</td>
			<td>{{$company->city}}</td>
			<td>{{$company->area}}</td>
			<td>{{$company->street_address}}</td>
			<td>{{$company->post_code}}</td>
			<td>{{$company->inactive}}</td>
			<td>{{$company->logo}}</td>

			<td>
			<form action = "{{route('companys.destroy',$company->id)}}" method = "post">
				<a class= 'btn btn-primary' href = "{{route('companys.show',$company->id)}}">View</a>
				<a class= 'btn btn-success' href = "{{route('companys.edit',$company->id)}}"> Edit </a>
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
