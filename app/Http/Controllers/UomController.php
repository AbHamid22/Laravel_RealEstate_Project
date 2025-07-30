<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Uom;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class UomController extends Controller{
	public function index(){
		$uoms = Uom::paginate(10);
		return view("pages.uom.index",["uoms"=>$uoms]);
	}
	public function create(){
		return view("pages.uom.create",[]);
	}
	public function store(Request $request){
		//Uom::create($request->all());
		$uom = new Uom;
		$uom->name=$request->name;

		$uom->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$uom = Uom::find($id);
		return view("pages.uom.show",["uom"=>$uom]);
	}
	public function edit(Uom $uom){
		return view("pages.uom.edit",["uom"=>$uom,]);
	}
	public function update(Request $request,Uom $uom){
		//Uom::update($request->all());
		$uom = Uom::find($uom->id);
		$uom->name=$request->name;

		$uom->save();

		return redirect()->route("uoms.index")->with('success','Updated Successfully.');
	}
	public function destroy(Uom $uom){
		$uom->delete();
		return redirect()->route("uoms.index")->with('success', 'Deleted Successfully.');
	}
}
?>
