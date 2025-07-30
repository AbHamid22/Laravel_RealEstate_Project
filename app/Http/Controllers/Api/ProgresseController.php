<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Progress;
use Illuminate\Http\Request;

class ProgresseController extends Controller
{
    // List all progress records with relationships
    public function index()
    {
        $progresses = Progress::with(['module', 'project', 'status'])
            ->orderBy('created_at', 'desc')
            
            ->get();

        return response()->json($progresses);
    }

    // Store a new progress record
    public function store(Request $request)
    {
        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'project_id' => 'required|exists:projects,id',
            'percent' => 'required|numeric|min:0|max:100',
            'review' => 'nullable|string',
            'status_id' => 'nullable|exists:project_statuses,id',
            'updated_by' => 'nullable|string|max:255',
            'expected_completion_date' => 'nullable|date',
            'actual_completion_date' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        $validated['updated_at'] = now('Asia/Dhaka');

        $progress = Progress::create($validated);

        return response()->json([
            'message' => 'Progress created successfully.',
            'data' => $progress->load(['module', 'project', 'status']),
        ], 201);
    }

    // Show a specific progress record
    public function show($id)
    {
        $progress = Progress::with(['module', 'project', 'status'])->find($id);

        if (!$progress) {
            return response()->json(['message' => 'Progress not found.'], 404);
        }

        return response()->json($progress);
    }

    // Update a specific progress record
    public function update(Request $request, $id)
    {
        $progress = Progress::find($id);

        if (!$progress) {
            return response()->json(['message' => 'Progress not found.'], 404);
        }

        $validated = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'project_id' => 'required|exists:projects,id',
            'percent' => 'required|numeric|min:0|max:100',
            'review' => 'nullable|string',
            'status_id' => 'nullable|exists:project_statuses,id',
            'updated_by' => 'nullable|string|max:255',
            'expected_completion_date' => 'nullable|date',
            'actual_completion_date' => 'nullable|date',
            'remarks' => 'nullable|string',
        ]);

        $validated['updated_at'] = now('Asia/Dhaka');

        $progress->update($validated);

        return response()->json([
            'message' => 'Progress updated successfully.',
            'data' => $progress->load(['module', 'project', 'status']),
        ]);
    }

    // Delete a specific progress record
    public function destroy($id)
    {
        $progress = Progress::find($id);

        if (!$progress) {
            return response()->json(['message' => 'Progress not found.'], 404);
        }

        $progress->delete();

        return response()->json(['message' => 'Progress deleted successfully.']);
    }
}
