
@extends('layouts.master')
@section('title','Edit Product')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('products.index')}}">Manage</a>
<form action="{{route('products.update',$product)}}" method ="post" enctype="multipart/form-data">
@csrf
@method("PUT")
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo"  id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" value="{{$product->name}}" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" value="{{$product->price}}" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" value="{{$product->discount}}" id="discount" placeholder="Discount">
	</div>
</div>
<div class="row mb-3">
	<label for="product_category_id" class="col-sm-2 col-form-label">Product_Category</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_category_id" id="product_category_id">
			@foreach($product_categorys as $product_category)
				@if($product_category->id==$product->product_category_id)
					<option value="{{$product_category->id}}" selected>{{$product_category->name}}</option>
				@else
					<option value="{{$product_category->id}}">{{$product_category->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="product_type_id" class="col-sm-2 col-form-label">Product_Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_type_id" id="product_type_id">
			@foreach($product_types as $product_type)
				@if($product_type->id==$product->product_type_id)
					<option value="{{$product_type->id}}" selected>{{$product_type->name}}</option>
				@else
					<option value="{{$product_type->id}}">{{$product_type->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="uom_id" class="col-sm-2 col-form-label">Uom</label>
	<div class="col-sm-10">
		<select class="form-control" name="uom_id" id="uom_id">
			@foreach($uom as $uom)
				@if($uom->id==$product->uom_id)
					<option value="{{$uom->id}}" selected>{{$uom->name}}</option>
				@else
					<option value="{{$uom->id}}">{{$uom->name}}</option>
				@endif
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="qty" class="col-sm-2 col-form-label">Qty</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="qty" value="{{$product->qty}}" id="qty" placeholder="Qty">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save Change</button>
</form>
@endsection
@section('script')


@endsection
