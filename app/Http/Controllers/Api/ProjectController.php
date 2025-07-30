<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;
use App\Models\ProjectType;
use App\Models\ProjectStatuse;
use App\Models\Contractor;
use Illuminate\Http\JsonResponse;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {

        $projects = Project::with(['type', 'status', 'contractor'])->paginate(10);
        // return response()->json(["projects"=>Project::All()]);
        // print_r("projects");
        return response()->json($projects);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Validate incoming request
        $validated = $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:project_types,id',
            'status_id' => 'required|exists:project_statuses,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'contractor_id' => 'required|exists:contractors,id',
        ]);

        // Handle photo upload
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/projects'), $imageName);
        } else {
            $imageName = null;
        }

        // Create new project
        $project = Project::create([
            'photo' => $imageName,
            'name' => $validated['name'],
            'type_id' => $validated['type_id'],
            'status_id' => $validated['status_id'],
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'contractor_id' => $validated['contractor_id'],
        ]);

        return response()->json([
            'message' => 'Project created successfully.',
            'project' => $project
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        // Make sure you're using find($id), not first()
        $project = Project::with(['type', 'status', 'contractor'])->find($id);

        if (!$project) {
            return response()->json([
                'message' => "Project with ID {$id} not found."
            ], 404);
        }

        return response()->json($project->toArray());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json([
                'message' => 'Project not found.'
            ], 404);
        }

        $validated = $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required|string|max:255',
            'type_id' => 'required|exists:project_types,id',
            'status_id' => 'required|exists:project_statuses,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'contractor_id' => 'required|exists:contractors,id',
        ]);

        // Handle photo upload if exists
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($project->photo && file_exists(public_path('img/projects/' . $project->photo))) {
                unlink(public_path('img/projects/' . $project->photo));
            }

            $image = $request->file('photo');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img/projects'), $imageName);
            $project->photo = $imageName;
        }

        // Update other fields
        $project->name = $validated['name'];
        $project->type_id = $validated['type_id'];
        $project->status_id = $validated['status_id'];
        $project->start_date = $validated['start_date'];
        $project->end_date = $validated['end_date'];
        $project->contractor_id = $validated['contractor_id'];

        $project->save();

        return response()->json([
            'message' => 'Project updated successfully.',
            'project' => $project
        ], 200);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return response()->json([
                'message' => 'Project not found.'
            ], 404);
        }

        $project->delete();

        return response()->json([
            'message' => 'Project deleted successfully.'
        ], 200);
    }
}
