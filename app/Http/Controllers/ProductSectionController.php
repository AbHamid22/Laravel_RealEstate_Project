<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProductSection;
use App\Models\ProductUnit;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProductSectionController extends Controller{
	public function index(){
		$productsections = ProductSection::paginate(10);
		return view("pages.productsection.index",["productsections"=>$productsections]);
	}
	public function create(){
		return view("pages.productsection.create",["units"=>ProductUnit::all()]);
	}
	public function store(Request $request){
		//ProductSection::create($request->all());
		$productsection = new ProductSection;
		$productsection->name=$request->name;
		$productsection->unit_id=$request->unit_id;
		if(isset($request->photo)){
			$productsection->photo=$request->photo;
		}
		$productsection->icon=$request->icon;

		$productsection->save();
		if(isset($request->photo)){
			$imageName=$productsection->id.'.'.$request->photo->extension();
			$productsection->photo=$imageName;
			$productsection->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$productsection = ProductSection::find($id);
		return view("pages.productsection.show",["productsection"=>$productsection]);
	}
	public function edit(ProductSection $productsection){
		return view("pages.productsection.edit",["productsection"=>$productsection,"units"=>ProductUnit::all()]);
	}
	public function update(Request $request,ProductSection $productsection){
		//ProductSection::update($request->all());
		$productsection = ProductSection::find($productsection->id);
		$productsection->name=$request->name;
		$productsection->unit_id=$request->unit_id;
		if(isset($request->photo)){
			$productsection->photo=$request->photo;
		}
		$productsection->icon=$request->icon;

		$productsection->save();
		if(isset($request->photo)){
			$imageName=$productsection->id.'.'.$request->photo->extension();
			$productsection->photo=$imageName;
			$productsection->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("productsections.index")->with('success','Updated Successfully.');
	}
	public function destroy(ProductSection $productsection){
		$productsection->delete();
		return redirect()->route("productsections.index")->with('success', 'Deleted Successfully.');
	}
}
?>
