<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProductUnit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProductUnitController extends Controller{
	public function index(){
		$productunits = ProductUnit::paginate(10);
		return view("pages.productunit.index",["productunits"=>$productunits]);
	}
	public function create(){
		return view("pages.productunit.create",[]);
	}
	public function store(Request $request){
		//ProductUnit::create($request->all());
		$productunit = new ProductUnit;
		$productunit->name=$request->name;

		$productunit->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$productunit = ProductUnit::find($id);
		return view("pages.productunit.show",["productunit"=>$productunit]);
	}
	public function edit(ProductUnit $productunit){
		return view("pages.productunit.edit",["productunit"=>$productunit,]);
	}
	public function update(Request $request,ProductUnit $productunit){
		//ProductUnit::update($request->all());
		$productunit = ProductUnit::find($productunit->id);
		$productunit->name=$request->name;

		$productunit->save();

		return redirect()->route("productunits.index")->with('success','Updated Successfully.');
	}
	public function destroy(ProductUnit $productunit){
		$productunit->delete();
		return redirect()->route("productunits.index")->with('success', 'Deleted Successfully.');
	}
}
?>
