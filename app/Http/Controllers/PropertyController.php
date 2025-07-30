<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Category;
use App\Models\Project;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PropertyController extends Controller
{
	public function index(Request $request)
	{
		$query = Property::with(['category', 'project']);

		if ($request->has('search') && !empty($request->search)) {
			$search = $request->search;

			$query->where(function ($q) use ($search) {
				$q->where('title', 'like', '%' . $search . '%')
					->orWhere('location', 'like', '%' . $search . '%')
					->orWhereHas('category', function ($q2) use ($search) {
						$q2->where('name', 'like', '%' . $search . '%');
					});
			});
		}

		$propertys = $query->latest()->paginate(4)->appends(['search' => $request->search]);

		return view("pages.property.index", ["propertys" => $propertys]);
	}



	public function create()
	{
		return view("pages.property.create", ["categories" => Category::all(), "projects" => Project::all()]);
	}
	public function store(Request $request)
	{
		//Property::create($request->all());
		$property = new Property;
		if (isset($request->photo)) {
			$property->photo = $request->photo;
		}
		$property->title = $request->title;
		$property->description = $request->description;
		$property->sqft = $request->sqft;
		$property->bed_room = $request->bed_room;
		$property->bath_room = $request->bath_room;
		$property->category_id = $request->category_id;
		$property->project_id = $request->project_id;
		$property->price = $request->price;
		$property->status = $request->status;
		$property->location = $request->location;
		date_default_timezone_set("Asia/Dhaka");
		$property->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$property->updated_at = date('Y-m-d H:i:s');

		$property->save();
		if (isset($request->photo)) {
			$imageName = $property->id . '.' . $request->photo->extension();
			$property->photo = $imageName;
			$property->update();
			$request->photo->move(public_path('img/properties'), $imageName);
		}

		return back()->with('success', 'Created Successfully.');

		return redirect("propertys");
	}
	public function show($id)
	{
		$property = Property::find($id);
		return view("pages.property.show", ["property" => $property]);
	}
	public function edit(Property $property)
	{
		return view("pages.property.edit", ["property" => $property, "categories" => Category::all(), "projects" => Project::all()]);
	}
	public function update(Request $request, Property $property)
	{
		//Property::update($request->all());
		$property = Property::find($property->id);
		if (isset($request->photo)) {
			$property->photo = $request->photo;
		}
		$property->title = $request->title;
		$property->description = $request->description;
		$property->sqft = $request->sqft;
		$property->bed_room = $request->bed_room;
		$property->bath_room = $request->bath_room;
		$property->category_id = $request->category_id;
		$property->project_id = $request->project_id;
		$property->price = $request->price;
		$property->status = $request->status;
		$property->location = $request->location;
		date_default_timezone_set("Asia/Dhaka");
		$property->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$property->updated_at = date('Y-m-d H:i:s');

		$property->save();
		if (isset($request->photo)) {
			$imageName = $property->id . '.' . $request->photo->extension();
			$property->photo = $imageName;
			$property->update();
			$request->photo->move(public_path('img/properties'), $imageName);
		}

		return redirect()->route("propertys.index")->with('success', 'Updated Successfully.');

		return redirect("propertys");
	}
	public function destroy(Property $property)
	{
		$property->delete();
		return redirect()->route("propertys.index")->with('success', 'Deleted Successfully.');
	}
}
