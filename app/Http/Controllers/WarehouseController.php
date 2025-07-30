<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class WarehouseController extends Controller{
	public function index(){
		$warehouses = Warehouse::paginate(10);
		return view("pages.warehouse.index",["warehouses"=>$warehouses]);
	}
	public function create(){
		return view("pages.warehouse.create",[]);
	}
	public function store(Request $request){
		//Warehouse::create($request->all());
		$warehouse = new Warehouse;
		$warehouse->name=$request->name;
		$warehouse->city=$request->city;
		$warehouse->contact=$request->contact;

		$warehouse->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$warehouse = Warehouse::find($id);
		return view("pages.warehouse.show",["warehouse"=>$warehouse]);
	}
	public function edit(Warehouse $warehouse){
		return view("pages.warehouse.edit",["warehouse"=>$warehouse,]);
	}
	public function update(Request $request,Warehouse $warehouse){
		//Warehouse::update($request->all());
		$warehouse = Warehouse::find($warehouse->id);
		$warehouse->name=$request->name;
		$warehouse->city=$request->city;
		$warehouse->contact=$request->contact;

		$warehouse->save();

		return redirect()->route("warehouses.index")->with('success','Updated Successfully.');
	}
	public function destroy(Warehouse $warehouse){
		$warehouse->delete();
		return redirect()->route("warehouses.index")->with('success', 'Deleted Successfully.');
	}
}
?>
