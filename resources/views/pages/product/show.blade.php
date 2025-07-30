
@extends('layouts.master')
@section('title','Show Product')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('products.index')}}">Manage</a>
<table class='table table-striped text-nowrap'>
<tbody>
		<tr><th>Id</th><td>{{$product->id}}</td></tr>
		<tr><th>Photo</th><td><img src="{{asset('img/products/'.$product->photo)}}" width="100" /></td></tr>
		<tr><th>Name</th><td>{{$product->name}}</td></tr>
		<tr><th>Price</th><td>{{$product->price}}</td></tr>
		<tr><th>Discount</th><td>{{$product->discount}}</td></tr>
		<tr><th>Product Category Id</th><td>{{$product->product_category_id}}</td></tr>
		<tr><th>Product Type Id</th><td>{{$product->product_type_id}}</td></tr>
		<tr><th>Uom Id</th><td>{{$product->uom_id}}</td></tr>
		<tr><th>Qty</th><td>{{$product->qty}}</td></tr>
		<tr><th>Created At</th><td>{{$product->created_at}}</td></tr>
		<tr><th>Updated At</th><td>{{$product->updated_at}}</td></tr>

</tbody>
</table>
@endsection
@section('script')


@endsection
