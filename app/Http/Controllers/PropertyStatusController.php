<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PropertyStatus;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PropertyStatusController extends Controller
{
	public function index()
	{
		$status = PropertyStatus::paginate(10);
		return view("pages.propertystatus.index", ["statuses" => $status]);
	}
	public function create()
	{
		return view("pages.propertystatus.create", []);
	}
	public function store(Request $request)
	{
		//Statuse::create($request->all());
		$status = new PropertyStatus;
		$status->name = $request->name;
		date_default_timezone_set("Asia/Dhaka");
		$status->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$status->updated_at = date('Y-m-d H:i:s');

		$status->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$status = PropertyStatus::find($id);
		return view("pages.propertystatus.show", ["statuses" => $status]);
	}
	public function edit(PropertyStatus $status)
	{
		return view('pages.propertystatus.edit', ['statuses' => $status]);
	}
	
	public function update(Request $request, PropertyStatus $status){
		// Update the model
		$status->name = $request->name;
		$status->updated_at = now(); // Keep only updated_at here, not created_at
		$status->save();
	
		return redirect()->route('propertystatuses.index')->with('success', 'Updated Successfully.');
	}
	
	public function destroy(PropertyStatus $status)
	{
		$status->delete();
		return redirect()->route("propertystatuses.index")->with('success', 'Deleted Successfully.');
	}
}
