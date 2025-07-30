<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductType;
use App\Models\Uom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProductController extends Controller
{
	public function index()
	{
		$products = Product::with(['category', 'type', 'uom'])->paginate(5);
		return view("pages.product.index", ["products" => $products]);
	}

	public function create()
	{
		return view("pages.product.create", ["product_categorys" => ProductCategory::all(), "product_types" => ProductType::all(), "uom" => Uom::all()]);
	}
	public function store(Request $request)
	{
		//Product::create($request->all());
		$product = new Product;
		if (isset($request->photo)) {
			$product->photo = $request->photo;
		}
		$product->name = $request->name;
		$product->price = $request->price;
		$product->discount = $request->discount;
		$product->product_category_id = $request->product_category_id;
		$product->product_type_id = $request->product_type_id;
		$product->uom_id = $request->uom_id;
		$product->qty = $request->qty;
		date_default_timezone_set("Asia/Dhaka");
		$product->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$product->updated_at = date('Y-m-d H:i:s');

		$product->save();
		if (isset($request->photo)) {
			$imageName = $product->id . '.' . $request->photo->extension();
			$product->photo = $imageName;
			$product->update();
			$request->photo->move(public_path('img/products'), $imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$product = Product::find($id);
		return view("pages.product.show", ["product" => $product]);
	}
	public function edit(Product $product)
	{
		return view("pages.product.edit", ["product" => $product, "product_categorys" => ProductCategory::all(), "product_types" => ProductType::all(), "uom" => Uom::all()]);
	}
	public function update(Request $request, Product $product)
	{
		//Product::update($request->all());
		$product = Product::find($product->id);
		if (isset($request->photo)) {
			$product->photo = $request->photo;
		}
		$product->name = $request->name;
		$product->price = $request->price;
		$product->discount = $request->discount;
		$product->product_category_id = $request->product_category_id;
		$product->product_type_id = $request->product_type_id;
		$product->uom_id = $request->uom_id;
		$product->qty = $request->qty;
		date_default_timezone_set("Asia/Dhaka");
		$product->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$product->updated_at = date('Y-m-d H:i:s');

		$product->save();
		if (isset($request->photo)) {
			$imageName = $product->id . '.' . $request->photo->extension();
			$product->photo = $imageName;
			$product->update();
			$request->photo->move(public_path('img/products'), $imageName);
		}

		return redirect()->route("products.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Product $product)
	{
		$product->delete();
		return redirect()->route("products.index")->with('success', 'Deleted Successfully.');
	}
	// app/Http/Controllers/ProductController.php
}
