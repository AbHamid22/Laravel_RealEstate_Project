<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProjectCosting;
use App\Models\Project;
use App\Models\Module;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProjectCostingController extends Controller
{
	public function index()
	{
		$projectcostings = ProjectCosting::with(['project', 'module'])->paginate(10);
		return view("pages.projectcosting.index", ["projectcostings" => $projectcostings]);
	}

	public function create()
	{
		return view("pages.projectcosting.create", ["projects" => Project::all(), "modules" => Module::all()]);
	}
	public function store(Request $request)
	{
		//ProjectCosting::create($request->all());
		$projectcosting = new ProjectCosting;
		$projectcosting->project_id = $request->project_id;
		$projectcosting->module_id = $request->module_id;
		$projectcosting->budget = $request->budget;
		$projectcosting->actual_cost = $request->actual_cost;
		$projectcosting->days = $request->days;
		date_default_timezone_set("Asia/Dhaka");
		$projectcosting->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$projectcosting->updated_at = date('Y-m-d H:i:s');

		$projectcosting->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$projectcosting = ProjectCosting::find($id);
		return view("pages.projectcosting.show", ["projectcosting" => $projectcosting]);
	}
	public function edit(ProjectCosting $projectcosting)
	{
		return view("pages.projectcosting.edit", ["projectcosting" => $projectcosting, "projects" => Project::all(), "modules" => Module::all()]);
	}
	public function update(Request $request, ProjectCosting $projectcosting)
	{
		//ProjectCosting::update($request->all());
		$projectcosting = ProjectCosting::find($projectcosting->id);
		$projectcosting->project_id = $request->project_id;
		$projectcosting->module_id = $request->module_id;
		$projectcosting->budget = $request->budget;
		$projectcosting->actual_cost = $request->actual_cost;
		$projectcosting->days = $request->days;
		date_default_timezone_set("Asia/Dhaka");
		$projectcosting->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$projectcosting->updated_at = date('Y-m-d H:i:s');

		$projectcosting->save();

		return redirect()->route("projectcostings.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(ProjectCosting $projectcosting)
	{
		$projectcosting->delete();
		return redirect()->route("projectcostings.index")->with('success', 'Deleted Successfully.');
	}
}
