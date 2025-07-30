<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StatusController extends Controller{
	public function index(){
		$status = Status::paginate(10);
		return view("pages.status.index",["status"=>$status]);
	}
	public function create(){
		return view("pages.status.create",[]);
	}
	public function store(Request $request){
		//Statu::create($request->all());
		$statu = new Status;
		$statu->name=$request->name;

		$statu->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$statu = Status::find($id);
		return view("pages.status.show",["statu"=>$statu]);
	}
	public function edit(Status $statu){
		return view("pages.status.edit",["statu"=>$statu,]);
	}
	public function update(Request $request,Status $statu){
		//Statu::update($request->all());
		$statu = Status::find($statu->id);
		$statu->name=$request->name;

		$statu->save();

		return redirect()->route("status.index")->with('success','Updated Successfully.');
	}
	public function destroy(Status $statu){
		$statu->delete();
		return redirect()->route("status.index")->with('success', 'Deleted Successfully.');
	}
}
?>
