<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProjectType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProjectTypeController extends Controller{
	public function index(){
		$projecttypes = ProjectType::paginate(10);
		return view("pages.projecttype.index",["projecttypes"=>$projecttypes]);
	}
	public function create(){
		return view("pages.projecttype.create",[]);
	}
	public function store(Request $request){
		//ProjectType::create($request->all());
		$projecttype = new ProjectType;
		$projecttype->name=$request->name;

		$projecttype->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$projecttype = ProjectType::find($id);
		return view("pages.projecttype.show",["projecttype"=>$projecttype]);
	}
	public function edit(ProjectType $projecttype){
		return view("pages.projecttype.edit",["projecttype"=>$projecttype,]);
	}
	public function update(Request $request,ProjectType $projecttype){
		//ProjectType::update($request->all());
		$projecttype = ProjectType::find($projecttype->id);
		$projecttype->name=$request->name;

		$projecttype->save();

		return redirect()->route("projecttypes.index")->with('success','Updated Successfully.');
	}
	public function destroy(ProjectType $projecttype){
		$projecttype->delete();
		return redirect()->route("projecttypes.index")->with('success', 'Deleted Successfully.');
	}
}
?>
