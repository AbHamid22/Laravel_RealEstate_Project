<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use App\Models\Module;
use App\Models\Project;
use App\Models\ProjectStatuse;
use Illuminate\Http\Request;

class ProgresseController extends Controller
{
	// public function index()
	// {
	// 	$progresses = Progress::with('module', 'project')->get();
	// 	return view("pages.progress.index", compact('progresses'));
	// }

	public function index()
	{
		$progresses = Progress::with(['module', 'project','status'])
			->orderBy('created_at', 'desc')
			->paginate(4); // You can change the number per page

		return view('pages.progress.index', compact('progresses'));

		$progresses = Progress::with(['module', 'project'])->get()->map(function ($progresse) {
			$progresse->is_project_complete = $progresse->project->status_id == 2; // assuming 3 = complete
			return view('pages.progress.index', compact('progresses'));
		});
	}



	public function create()
	{
		$modules = Module::all();
		$projects = Project::all();
		$status = ProjectStatuse::all();
		return view("pages.progress.create", compact('modules', 'projects','status'));
	}

	public function store(Request $request)
	{
		$progress = new Progress();
		$progress->module_id = $request->module_id;
		$progress->project_id = $request->project_id;
		$progress->percent = $request->percent;
		$progress->review = $request->review;
		$progress->status_id = $request->status_id;
		$progress->updated_by = $request->updated_by;
		$progress->expected_completion_date = $request->expected_completion_date;
		$progress->actual_completion_date = $request->actual_completion_date;
		$progress->remarks = $request->remarks;
		$progress->updated_at = now('Asia/Dhaka');
		$progress->save();

		return back()->with('success', 'Created Successfully.');
	}

	public function show(Progress $progress)
	{

		return view("pages.progress.show", compact('progress'));
	}

	public function edit(Progress $progress)
	{
		$modules = Module::all();
		$projects = Project::all();
		$status = ProjectStatuse::all();
		return view("pages.progress.edit", compact('progress', 'modules', 'projects','status'));
	}

	public function update(Request $request, Progress $progress)
	{
		$progress->module_id = $request->module_id;
		$progress->project_id = $request->project_id;
		$progress->percent = $request->percent;
		$progress->review = $request->review;
		$progress->status_id = $request->status_id;
		$progress->updated_by = $request->updated_by;
		$progress->expected_completion_date = $request->expected_completion_date;
		$progress->actual_completion_date = $request->actual_completion_date;
		$progress->remarks = $request->remarks;
		$progress->updated_at = now('Asia/Dhaka');
		$progress->save();

		return redirect()->route("progresses.index")->with('success', 'Updated Successfully.');
	}

	public function destroy(Progress $progress)
	{
		$progress->delete();
		return redirect()->route("progresses.index")->with('success', 'Deleted Successfully.');
	}
}
