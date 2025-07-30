<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProductType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProductTypeController extends Controller{
	public function index(){
		$producttypes = ProductType::paginate(10);
		return view("pages.producttype.index",["producttypes"=>$producttypes]);
	}
	public function create(){
		return view("pages.producttype.create",[]);
	}
	public function store(Request $request){
		//ProductType::create($request->all());
		$producttype = new ProductType;
		$producttype->name=$request->name;

		$producttype->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$producttype = ProductType::find($id);
		return view("pages.producttype.show",["producttype"=>$producttype]);
	}
	public function edit(ProductType $producttype){
		return view("pages.producttype.edit",["producttype"=>$producttype,]);
	}
	public function update(Request $request,ProductType $producttype){
		//ProductType::update($request->all());
		$producttype = ProductType::find($producttype->id);
		$producttype->name=$request->name;

		$producttype->save();

		return redirect()->route("producttypes.index")->with('success','Updated Successfully.');
	}
	public function destroy(ProductType $producttype){
		$producttype->delete();
		return redirect()->route("producttypes.index")->with('success', 'Deleted Successfully.');
	}
}
?>
