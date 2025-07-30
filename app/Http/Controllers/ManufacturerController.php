<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Manufacturer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ManufacturerController extends Controller{
	public function index(){
		$manufacturers = Manufacturer::paginate(10);
		return view("pages.manufacturer.index",["manufacturers"=>$manufacturers]);
	}
	public function create(){
		return view("pages.manufacturer.create",[]);
	}
	public function store(Request $request){
		//Manufacturer::create($request->all());
		$manufacturer = new Manufacturer;
		$manufacturer->name=$request->name;

		$manufacturer->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$manufacturer = Manufacturer::find($id);
		return view("pages.manufacturer.show",["manufacturer"=>$manufacturer]);
	}
	public function edit(Manufacturer $manufacturer){
		return view("pages.manufacturer.edit",["manufacturer"=>$manufacturer,]);
	}
	public function update(Request $request,Manufacturer $manufacturer){
		//Manufacturer::update($request->all());
		$manufacturer = Manufacturer::find($manufacturer->id);
		$manufacturer->name=$request->name;

		$manufacturer->save();

		return redirect()->route("manufacturers.index")->with('success','Updated Successfully.');
	}
	public function destroy(Manufacturer $manufacturer){
		$manufacturer->delete();
		return redirect()->route("manufacturers.index")->with('success', 'Deleted Successfully.');
	}
}
?>
