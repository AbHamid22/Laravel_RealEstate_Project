<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProductCategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProductCategoryController extends Controller{
	public function index(){
		$productcategorys = ProductCategory::paginate(10);
		return view("pages.productcategory.index",["productcategorys"=>$productcategorys]);
	}
	public function create(){
		return view("pages.productcategory.create",[]);
	}
	public function store(Request $request){
		//ProductCategory::create($request->all());
		$productcategory = new ProductCategory;
		$productcategory->name=$request->name;
date_default_timezone_set("Asia/Dhaka");
		$productcategory->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$productcategory->updated_at=date('Y-m-d H:i:s');

		$productcategory->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$productcategory = ProductCategory::find($id);
		return view("pages.productcategory.show",["productcategory"=>$productcategory]);
	}
	public function edit(ProductCategory $productcategory){
		return view("pages.productcategory.edit",["productcategory"=>$productcategory,]);
	}
	public function update(Request $request,ProductCategory $productcategory){
		//ProductCategory::update($request->all());
		$productcategory = ProductCategory::find($productcategory->id);
		$productcategory->name=$request->name;
date_default_timezone_set("Asia/Dhaka");
		$productcategory->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$productcategory->updated_at=date('Y-m-d H:i:s');

		$productcategory->save();

		return redirect()->route("productcategorys.index")->with('success','Updated Successfully.');
	}
	public function destroy(ProductCategory $productcategory){
		$productcategory->delete();
		return redirect()->route("productcategorys.index")->with('success', 'Deleted Successfully.');
	}
}
?>
