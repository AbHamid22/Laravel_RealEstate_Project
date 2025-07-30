<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectCosting;
use App\Models\Project;
use App\Models\Module;

class ProjectCostingController extends Controller
{

    public function index()
    {
        $projectcostings = ProjectCosting::with(['project', 'module'])->paginate(2);
        return response()->json($projectcostings);
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'module_id' => 'required|exists:modules,id',
            'budget' => 'required|numeric',
            'actual_cost' => 'required|numeric',
            'days' => 'required|string',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
            'created_by' => 'required|string',
            'updated_by' => 'nullable|string',
        ]);

        $projectcosting = ProjectCosting::create($validated);

        return response()->json([
            'message' => 'Project Costing created successfully.',
            'data' => $projectcosting->load(['project', 'module']),
        ], 201);
    }


    public function show($id)
    {
        $projectcosting = ProjectCosting::with(['project', 'module'])->findOrFail($id);

        return response()->json($projectcosting);
    }

  
    public function update(Request $request, $id)
    {
        $projectcosting = ProjectCosting::findOrFail($id);

        $validated = $request->validate([
            'project_id' => 'required|exists:projects,id',
            'module_id' => 'required|exists:modules,id',
            'budget' => 'required|numeric',
            'actual_cost' => 'required|numeric',
            'days' => 'required|string',
            'status' => 'required|string',
            'remarks' => 'nullable|string',
            'created_by' => 'required|string',
            'updated_by' => 'nullable|string',
        ]);

        $projectcosting->update($validated);

        return response()->json([
            'message' => 'Project Costing updated successfully.',
            'data' => $projectcosting->load(['project', 'module']),
        ]);
    }


    public function destroy($id)
    {
        $projectcosting = ProjectCosting::findOrFail($id);
        $projectcosting->delete();

        return response()->json([
            'message' => 'Project Costing deleted successfully.'
        ]);
    }
}
