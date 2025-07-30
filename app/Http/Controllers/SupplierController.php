<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Supplier;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class SupplierController extends Controller{
	public function index(){
		$suppliers = Supplier::paginate(10);
		return view("pages.supplier.index",["suppliers"=>$suppliers]);
	}
	public function create(){
		return view("pages.supplier.create",[]);
	}
	public function store(Request $request){
		//Supplier::create($request->all());
		$supplier = new Supplier;
		$supplier->name=$request->name;
		$supplier->mobile=$request->mobile;
		$supplier->email=$request->email;
		if(isset($request->photo)){
			$supplier->photo=$request->photo;
		}

		$supplier->save();
		if(isset($request->photo)){
			$imageName=$supplier->id.'.'.$request->photo->extension();
			$supplier->photo=$imageName;
			$supplier->update();
			$request->photo->move(public_path('img'),$imageName);
		}
		return redirect()->route("suppliers.index")->with('success', 'Created Successfully.');

	

	}
	public function show($id){
		$supplier = Supplier::find($id);
		return view("pages.supplier.show",["supplier"=>$supplier]);
	}
	public function edit(Supplier $supplier){
		return view("pages.supplier.edit",["supplier"=>$supplier,]);
	}
	public function update(Request $request,Supplier $supplier){
		//Supplier::update($request->all());
		$supplier = Supplier::find($supplier->id);
		$supplier->name=$request->name;
		$supplier->mobile=$request->mobile;
		$supplier->email=$request->email;
		if(isset($request->photo)){
			$supplier->photo=$request->photo;
		}

		$supplier->save();
		if(isset($request->photo)){
			$imageName=$supplier->id.'.'.$request->photo->extension();
			$supplier->photo=$imageName;
			$supplier->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("suppliers.index")->with('success','Updated Successfully.');
	}
	public function destroy(Supplier $supplier){
		$supplier->delete();
		return redirect()->route("suppliers.index")->with('success', 'Deleted Successfully.');
	}
}
?>
