<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Status;
use App\Models\Contractor;
use App\Models\PropertyStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ProjectController extends Controller{
	public function index(){
		$projects = Project::with(['status', 'contractor'])->paginate(10);

		return view("pages.project.index",["projects"=>$projects]);
	}
	public function create(){
		return view("pages.project.create",["status"=>PropertyStatus::all(),"contractors"=>Contractor::all()]);
	}
	public function store(Request $request){
		//Project::create($request->all());
		$project = new Project;
		$project->name=$request->name;
		$project->description=$request->description;
		$project->status_id=$request->status_id;
		$project->start_date=$request->start_date;
		$project->end_date=$request->end_date;
		$project->contractor_id=$request->contractor_id;
		$project->budget=$request->budget;
		$project->totat_cost=$request->totat_cost;
date_default_timezone_set("Asia/Dhaka");
		$project->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$project->updated_at=date('Y-m-d H:i:s');

		$project->save();
		if(isset($request->photo)){
			$imageName=$project->id.'.'.$request->photo->extension();
			$project->photo=$imageName;
			$project->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$project = Project::find($id);
		return view("pages.project.show",["project"=>$project]);
	}
	public function edit(Project $project){
		return view("pages.project.edit",["project"=>$project,"status"=>PropertyStatus::all(),"contractors"=>Contractor::all()]);
	}
	public function update(Request $request,Project $project){
		//Project::update($request->all());
		$project = Project::find($project->id);
		if(isset($request->photo)){
			$project->photo=$request->photo;
		}
		$project->name=$request->name;
		$project->description=$request->description;
		$project->status_id=$request->status_id;
		$project->start_date=$request->start_date;
		$project->end_date=$request->end_date;
		$project->contractor_id=$request->contractor_id;
		$project->budget=$request->budget;
		$project->totat_cost=$request->totat_cost;
date_default_timezone_set("Asia/Dhaka");
		$project->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$project->updated_at=date('Y-m-d H:i:s');

		$project->save();
		if(isset($request->photo)){
			$imageName=$project->id.'.'.$request->photo->extension();
			$project->photo=$imageName;
			$project->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("projects.index")->with('success','Updated Successfully.');
	}
	public function destroy(Project $project){
		$project->delete();
		return redirect()->route("projects.index")->with('success', 'Deleted Successfully.');
	}
}
?>
