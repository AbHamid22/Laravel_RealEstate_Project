<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Property;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;



class PropertyController extends Controller
{
	public function index()
	{
		$propertys = Property::paginate(10);
		return view("pages.property.index", ["propertys" => $propertys]);
	}
	public function create()
	{
		return view("pages.property.create", []);
	}


	public function store(Request $request)
	{
		$validated = $request->validate([
			'price' => 'required|numeric',
			'address' => 'required|string|unique:properties,address',
			'beds' => 'required|integer',
			'baths' => 'required|integer',
			'sqft' => 'required|integer',
			'year' => 'required|integer|min:1900|max:' . date('Y'),
			'details' => 'required|string',
			'gallery' => 'nullable|array',
			'gallery.*' => 'url',
			'lat' => 'required|numeric|unique:properties,lat',
			'lon' => 'required|numeric|unique:properties,lon',
		]);

		$property = new Property();
		$property->price = $validated['price'];
		$property->address = $validated['address'];
		$property->beds = $validated['beds'];
		$property->baths = $validated['baths'];
		$property->sqft = $validated['sqft'];
		$property->year = $validated['year'];
		$property->details = $validated['details'];
		$property->gallery = $validated['gallery'] ?? [];
		$property->lat = $validated['lat'];
		$property->lon = $validated['lon'];
		$property->slug = Str::slug($validated['address']);

		$galleryInput = $request->input('gallery_input');
		$galleryArray = array_filter(array_map('trim', explode(',', $galleryInput)));

		$property->gallery = $galleryArray;


		$property->save();

		return redirect()->back()->with('success', 'Created Successfully.');
	}





	public function show($id)
	{
		$property = Property::find($id);
		return view("pages.property.show", ["property" => $property]);
	}
	public function edit(Property $property)
	{
		return view("pages.property.edit", ["property" => $property,]);
	}


	public function update(Request $request, Property $property)
	{
		$validated = $request->validate([
			'price' => 'required|numeric',
			'address' => 'required|string|unique:properties,address,' . $property->id,
			'beds' => 'required|integer',
			'baths' => 'required|integer',
			'sqft' => 'required|integer',
			'year' => 'required|integer|min:1900|max:' . date('Y'),
			'details' => 'required|string',
			'gallery' => 'nullable|array',
			'gallery.*' => 'url',
			'lat' => 'required|numeric|unique:properties,lat,' . $property->id,
			'lon' => 'required|numeric|unique:properties,lon,' . $property->id,
		]);

		$property->update([
			'price' => $validated['price'],
			'address' => $validated['address'],
			'beds' => $validated['beds'],
			'baths' => $validated['baths'],
			'sqft' => $validated['sqft'],
			'year' => $validated['year'],
			'details' => $validated['details'],
			'gallery' => $validated['gallery'] ?? [],
			'lat' => $validated['lat'],
			'lon' => $validated['lon'],
			'slug' => Str::slug($validated['address']),
		]);
		$galleryInput = $request->input('gallery_input');
		$galleryArray = array_filter(array_map('trim', explode(',', $galleryInput)));

		$property->update([
			// ... other fields
			'gallery' => $galleryArray,
		]);


		return redirect()->route("propertys.index")->with('success', 'Updated Successfully.');
	}




	public function destroy(Property $property)
	{
		$property->delete();
		return redirect()->route("propertys.index")->with('success', 'Deleted Successfully.');
	}
}
