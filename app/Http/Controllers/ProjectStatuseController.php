<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProjectStatuse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProjectStatuseController extends Controller{
	public function index(){
		$projectstatuses = ProjectStatuse::paginate(10);
		return view("pages.projectstatuse.index",["projectstatuses"=>$projectstatuses]);
	}
	public function create(){
		return view("pages.projectstatuse.create",[]);
	}
	public function store(Request $request){
		//ProjectStatuse::create($request->all());
		$projectstatuse = new ProjectStatuse;
		$projectstatuse->name=$request->name;

		$projectstatuse->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$projectstatuse = ProjectStatuse::find($id);
		return view("pages.projectstatuse.show",["projectstatuse"=>$projectstatuse]);
	}
	public function edit(ProjectStatuse $projectstatuse){
		return view("pages.projectstatuse.edit",["projectstatuse"=>$projectstatuse,]);
	}
	public function update(Request $request,ProjectStatuse $projectstatuse){
		//ProjectStatuse::update($request->all());
		$projectstatuse = ProjectStatuse::find($projectstatuse->id);
		$projectstatuse->name=$request->name;

		$projectstatuse->save();

		return redirect()->route("projectstatuses.index")->with('success','Updated Successfully.');
	}
	public function destroy(ProjectStatuse $projectstatuse){
		$projectstatuse->delete();
		return redirect()->route("projectstatuses.index")->with('success', 'Deleted Successfully.');
	}
}
?>
