<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Vendor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class VendorController extends Controller{
	public function index(){
		$vendors = Vendor::paginate(10);
		return view("pages.vendor.index",["vendors"=>$vendors]);
	}
	public function create(){
		return view("pages.vendor.create",[]);
	}
	public function store(Request $request){
		//Vendor::create($request->all());
		$vendor = new Vendor;
		if(isset($request->photo)){
			$vendor->photo=$request->photo;
		}
		$vendor->name=$request->name;
		$vendor->mobile=$request->mobile;
		$vendor->email=$request->email;
		$vendor->address=$request->address;

		$vendor->save();
		if(isset($request->photo)){
			$imageName=$vendor->id.'.'.$request->photo->extension();
			$vendor->photo=$imageName;
			$vendor->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$vendor = Vendor::find($id);
		return view("pages.vendor.show",["vendor"=>$vendor]);
	}
	public function edit(Vendor $vendor){
		return view("pages.vendor.edit",["vendor"=>$vendor,]);
	}
	public function update(Request $request,Vendor $vendor){
		//Vendor::update($request->all());
		$vendor = Vendor::find($vendor->id);
		if(isset($request->photo)){
			$vendor->photo=$request->photo;
		}
		$vendor->name=$request->name;
		$vendor->mobile=$request->mobile;
		$vendor->email=$request->email;
		$vendor->address=$request->address;

		$vendor->save();
		if(isset($request->photo)){
			$imageName=$vendor->id.'.'.$request->photo->extension();
			$vendor->photo=$imageName;
			$vendor->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("vendors.index")->with('success','Updated Successfully.');
	}
	public function destroy(Vendor $vendor){
		$vendor->delete();
		return redirect()->route("vendors.index")->with('success', 'Deleted Successfully.');
	}
}
?>
