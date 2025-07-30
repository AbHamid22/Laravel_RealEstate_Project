
@extends('layouts.master')

@section('title','Show TransactionType')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('transactiontypes.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$transactiontype->id}}</td></tr>
		<tr><th>Name</th><td>{{$transactiontype->name}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
