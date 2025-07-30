<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\ProjectModule;
use App\Models\Project;
use App\Models\Module;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProjectModuleController extends Controller{
	public function index(){
		$projectmodules = ProjectModule::paginate(10);
		return view("pages.projectmodule.index",["projectmodules"=>$projectmodules]);
	}
	public function create(){
		return view("pages.projectmodule.create",["projects"=>Project::all(),"modules"=>Module::all()]);
	}
	public function store(Request $request){
		//ProjectModule::create($request->all());
		$projectmodule = new ProjectModule;
		$projectmodule->project_id=$request->project_id;
		$projectmodule->module_id=$request->module_id;
		$projectmodule->duration=$request->duration;
date_default_timezone_set("Asia/Dhaka");
		$projectmodule->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$projectmodule->updated_at=date('Y-m-d H:i:s');

		$projectmodule->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$projectmodule = ProjectModule::find($id);
		return view("pages.projectmodule.show",["projectmodule"=>$projectmodule]);
	}
	public function edit(ProjectModule $projectmodule){
		return view("pages.projectmodule.edit",["projectmodule"=>$projectmodule,"projects"=>Project::all(),"modules"=>Module::all()]);
	}
	public function update(Request $request,ProjectModule $projectmodule){
		//ProjectModule::update($request->all());
		$projectmodule = ProjectModule::find($projectmodule->id);
		$projectmodule->project_id=$request->project_id;
		$projectmodule->module_id=$request->module_id;
		$projectmodule->duration=$request->duration;
date_default_timezone_set("Asia/Dhaka");
		$projectmodule->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$projectmodule->updated_at=date('Y-m-d H:i:s');

		$projectmodule->save();

		return redirect()->route("projectmodules.index")->with('success','Updated Successfully.');
	}
	public function destroy(ProjectModule $projectmodule){
		$projectmodule->delete();
		return redirect()->route("projectmodules.index")->with('success', 'Deleted Successfully.');
	}
}
?>
