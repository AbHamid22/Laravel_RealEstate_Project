
@extends('layouts.master')
@section('title','Create Product')
@section('style')


@endsection
@section('page')
<a class='btn btn-success' href="{{route('products.index')}}">Manage</a>
<form action="{{route('products.store')}}" method ="post" enctype="multipart/form-data">
@csrf
<div class="row mb-3">
	<label for="photo" class="col-sm-2 col-form-label">Photo</label>
	<div class="col-sm-10">
		<input type = "file" class="form-control" name="photo" id="photo" placeholder="Photo">
	</div>
</div>
<div class="row mb-3">
	<label for="name" class="col-sm-2 col-form-label">Name</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="name" id="name" placeholder="Name">
	</div>
</div>
<div class="row mb-3">
	<label for="price" class="col-sm-2 col-form-label">Price</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="price" id="price" placeholder="Price">
	</div>
</div>
<div class="row mb-3">
	<label for="discount" class="col-sm-2 col-form-label">Discount</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="discount" id="discount" placeholder="Discount">
	</div>
</div>
<div class="row mb-3">
	<label for="product_category_id" class="col-sm-2 col-form-label">Product_Category</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_category_id" id="product_category_id">
			@foreach($product_categorys as $product_category)
				<option value="{{$product_category->id}}">{{$product_category->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="product_type_id" class="col-sm-2 col-form-label">Product_Type</label>
	<div class="col-sm-10">
		<select class="form-control" name="product_type_id" id="product_type_id">
			@foreach($product_types as $product_type)
				<option value="{{$product_type->id}}">{{$product_type->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="uom_id" class="col-sm-2 col-form-label">Uom</label>
	<div class="col-sm-10">
		<select class="form-control" name="uom_id" id="uom_id">
			@foreach($uom as $uom)
				<option value="{{$uom->id}}">{{$uom->name}}</option>
			@endforeach
		</select>
	</div>
</div>
<div class="row mb-3">
	<label for="uom" class="col-sm-2 col-form-label">UoM</label>
	<div class="col-sm-10">
		<input type = "text" class="form-control" name="uom" id="uom" placeholder="uom">
	</div>
</div>

<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection
@section('script')


@endsection
