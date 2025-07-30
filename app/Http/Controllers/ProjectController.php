<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectType;
use App\Models\ProjectStatuse;
use App\Models\Contractor;
use App\Models\Progress;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProjectController extends Controller
{
	public function index()
	{
		$projects = Project::with(['type', 'status', 'contractor'])->paginate(10);
		return view("pages.project.index", ["projects" => $projects]);
	}

	public function create()
	{
		return view("pages.project.create", ["types" => ProjectType::all(), "status" => ProjectStatuse::all(), "contractors" => Contractor::all()]);
	}
	public function store(Request $request)
	{
		//Project::create($request->all());
		$project = new Project;
		if (isset($request->photo)) {
			$project->photo = $request->photo;
		}
		$project->name = $request->name;
		$project->type_id = $request->type_id;
		$project->status_id = $request->status_id;
		$project->start_date = $request->start_date;
		$project->end_date = $request->end_date;
		$project->contractor_id = $request->contractor_id;
		date_default_timezone_set("Asia/Dhaka");
		$project->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$project->updated_at = date('Y-m-d H:i:s');

		$project->save();
		if (isset($request->photo)) {
			$imageName = $project->id . '.' . $request->photo->extension();
			$project->photo = $imageName;
			$project->update();
			$request->photo->move(public_path('img/projects'), $imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$project = Project::find($id);
		return view("pages.project.show", ["project" => $project]);
	}
	public function edit(Project $project)
	{
		return view("pages.project.edit", ["project" => $project, "types" => ProjectType::all(), "status" => ProjectStatuse::all(), "contractors" => Contractor::all()]);
	}


	public function update(Request $request, Project $project)
	{
		//Project::update($request->all());
		$project = Project::find($project->id);
		if (isset($request->photo)) {
			$project->photo = $request->photo;
		}
		$project->name = $request->name;
		$project->type_id = $request->type_id;
		$project->status_id = $request->status_id;
		$project->start_date = $request->start_date;
		$project->end_date = $request->end_date;
		$project->contractor_id = $request->contractor_id;
		date_default_timezone_set("Asia/Dhaka");
		$project->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$project->updated_at = date('Y-m-d H:i:s');

		$project->save();
		if (isset($request->photo)) {
			$imageName = $project->id . '.' . $request->photo->extension();
			$project->photo = $imageName;
			$project->update();
			$request->photo->move(public_path('img/projects'), $imageName);
		}


		// Check if project status is complete (assuming complete status_id = 3, adjust as needed)
		if ($request->status_id == 3) {
			// Optional: avoid duplicating 100% progress if it already exists
			$existing = Progress::where('project_id', $project->id)->where('percent', 100)->first();
			if (!$existing) {
				$progress = new Progress();
				$progress->project_id = $project->id;
				$progress->module_id = null; // Or assign a default module if necessary
				$progress->percent = 100;
				$progress->review = "Project completed";
				$progress->status = "Complete";
				$progress->updated_by = null;
				$progress->expected_completion_date = $request->end_date;
				$progress->actual_completion_date = now('Asia/Dhaka');
				$progress->remarks = "Auto-added on project completion";
				$progress->updated_at = now('Asia/Dhaka');
				$progress->save();
			}
		}



		return redirect()->route("projects.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(Project $project)
	{
		$project->delete();
		return redirect()->route("projects.index")->with('success', 'Deleted Successfully.');
	}
}
