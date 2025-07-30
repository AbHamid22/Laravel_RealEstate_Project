<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::with(['category', 'project'])->paginate(5);
        return response()->json($properties);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        // Validate request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sqft' => 'required|numeric',
            'bed_room' => 'required|integer',
            'bath_room' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'project_id' => 'nullable|exists:projects,id',
            'price' => 'required|numeric',
            'status' => 'nullable|string',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Create property instance
        $property = new Property($validated);

        // Save to assign an ID first
        $property->save();

        // Handle photo upload after save
        if ($request->hasFile('photo')) {
            $imageName = $property->id . '.' . $request->photo->extension();
            $request->photo->move(public_path('img/properties'), $imageName);

            // Update photo field and save
            $property->photo = $imageName;
            $property->save();
        }

        return response()->json([
            'success' => true,
            'message' => 'Property created successfully.',
            'data' => $property
        ], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show($id): JsonResponse
    {
        $property = Property::with(['category', 'project'])->find($id);

        if (!$property) {
            return response()->json(['error' => 'Property not found'], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $property
        ]);
    }




    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json([
                'success' => false,
                'message' => 'Property not found.'
            ], 404);
        }

        // Validate request
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'sqft' => 'required|numeric',
            'bed_room' => 'required|integer',
            'bath_room' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
            'project_id' => 'nullable|exists:projects,id',
            'price' => 'required|numeric',
            'status' => 'nullable|string',
            'location' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Update fields
        $property->fill($validated);
        $property->save();

        // Handle new photo upload if provided
        if ($request->hasFile('photo')) {
            $imageName = $property->id . '.' . $request->photo->extension();
            $request->photo->move(public_path('img/properties'), $imageName);
            $property->photo = $imageName;
            $property->save();
        }

        // Reload with relationships
        $property->load(['category', 'project']);

        return response()->json([
            'success' => true,
            'message' => 'Property updated successfully.',
            'data' => $property
        ]);
    }

    // public function update(Request $request, string $id): JsonResponse
    // {
    //     Log::info('Update request data:', $request->all());

    //     $property = Property::find($id);

    //     if (!$property) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Property not found.'
    //         ], 404);
    //     }

    //     // Validate
    //     try {
    //         $validated = $request->validate([
    //             'title' => 'required|string|max:255',
    //             'description' => 'nullable|string',
    //             'sqft' => 'required|numeric',
    //             'bed_room' => 'required|integer',
    //             'bath_room' => 'required|integer',
    //             'category_id' => 'nullable|exists:categories,id',
    //             'project_id' => 'nullable|exists:projects,id',
    //             'price' => 'required|numeric',
    //             'status' => 'nullable|string',
    //             'location' => 'required|string|max:255',
    //             'photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
    //         ]);
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Validation failed',
    //             'errors' => $e->errors()
    //         ], 422);
    //     }

    //     $property->fill($validated);
    //     $property->save();

    //     if ($request->hasFile('photo')) {
    //         $imageName = $property->id . '.' . $request->photo->extension();
    //         $request->photo->move(public_path('img/properties'), $imageName);
    //         $property->photo = $imageName;
    //         $property->save();
    //     }

    //     $property->load(['category', 'project']);

    //     return response()->json([
    //         'success' => true,
    //         'message' => 'Property updated successfully.',
    //         'data' => $property
    //     ]);
    // }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $property = Property::find($id);

        if (!$property) {
            return response()->json([
                'success' => false,
                'message' => 'Property not found.'
            ], 404);
        }

        $property->delete();

        return response()->json([
            'success' => true,
            'message' => 'Property deleted successfully.'
        ]);
    }
}
