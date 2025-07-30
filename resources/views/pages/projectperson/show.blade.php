@extends('layouts.master')
@section('title','Show ProjectPerson')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('projectpersons.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
	<tbody>
		<tr>
			<th>Id</th>
			<td>{{$projectperson->id}}</td>
		</tr>
		<tr>
			<th>Project Id</th>
			<td>{{$projectperson->project->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Person Id</th>
			<td>{{$projectperson->person->name ?? 'N/A' }}</td>
		</tr>
		<tr>
			<th>Assign At</th>
			<td>{{$projectperson->assign_at}}</td>
		</tr>
		<tr>
			<th>Created At</th>
			<td>{{$projectperson->created_at}}</td>
		</tr>
		<tr>
			<th>Updated At</th>
			<td>{{$projectperson->updated_at}}</td>
		</tr>



	</tbody>
</table>
@endsection
@section('script')


@endsection