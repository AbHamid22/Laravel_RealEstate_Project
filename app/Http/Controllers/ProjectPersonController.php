<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ProjectPerson;
use App\Models\Project;
use App\Models\Person;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProjectPersonController extends Controller
{
	public function index()
	{
		$projectpersons = ProjectPerson::with(['project', 'person'])->paginate(10);
		return view("pages.projectperson.index", ["projectpersons" => $projectpersons]);
	}

	public function create()
	{
		return view("pages.projectperson.create", ["projects" => Project::all(), "persons" => Person::all()]);
	}
	public function store(Request $request)
	{
		//ProjectPerson::create($request->all());
		$projectperson = new ProjectPerson;
		$projectperson->project_id = $request->project_id;
		$projectperson->person_id = $request->person_id;
		$projectperson->assign_at = $request->assign_at;
		date_default_timezone_set("Asia/Dhaka");
		$projectperson->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$projectperson->updated_at = date('Y-m-d H:i:s');

		$projectperson->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$projectperson = ProjectPerson::find($id);
		return view("pages.projectperson.show", ["projectperson" => $projectperson]);
	}
	public function edit(ProjectPerson $projectperson)
	{
		return view("pages.projectperson.edit", ["projectperson" => $projectperson, "projects" => Project::all(), "persons" => Person::all()]);
	}
	public function update(Request $request, ProjectPerson $projectperson)
	{
		//ProjectPerson::update($request->all());
		$projectperson = ProjectPerson::find($projectperson->id);
		$projectperson->project_id = $request->project_id;
		$projectperson->person_id = $request->person_id;
		$projectperson->assign_at = $request->assign_at;
		date_default_timezone_set("Asia/Dhaka");
		$projectperson->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$projectperson->updated_at = date('Y-m-d H:i:s');

		$projectperson->save();

		return redirect()->route("projectpersons.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(ProjectPerson $projectperson)
	{
		$projectperson->delete();
		return redirect()->route("projectpersons.index")->with('success', 'Deleted Successfully.');
	}
}
