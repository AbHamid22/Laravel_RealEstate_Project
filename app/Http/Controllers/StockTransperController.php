<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StockTransper;
use App\Models\Project;
use App\Models\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class StockTransperController extends Controller
{
	public function index()
	{
		$stocktranspers = StockTransper::with(['project', 'warehouse'])->paginate(10);
		return view("pages.stocktransper.index", ["stocktranspers" => $stocktranspers]);
	}

	public function create()
	{
		return view("pages.stocktransper.create", ["projects" => Project::all(), "warehouses" => Warehouse::all()]);
	}
	public function store(Request $request)
	{
		//StockTransper::create($request->all());
		$stocktransper = new StockTransper;
		$stocktransper->project_id = $request->project_id;
		$stocktransper->warehouse_id = $request->warehouse_id;
		$stocktransper->transper_date = $request->transper_date;
		date_default_timezone_set("Asia/Dhaka");
		$stocktransper->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$stocktransper->updated_at = date('Y-m-d H:i:s');

		$stocktransper->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$stocktransper = StockTransper::find($id);
		return view("pages.stocktransper.show", ["stocktransper" => $stocktransper]);
	}
	public function edit(StockTransper $stocktransper)
	{
		return view("pages.stocktransper.edit", ["stocktransper" => $stocktransper, "projects" => Project::all(), "warehouses" => Warehouse::all()]);
	}
	public function update(Request $request, StockTransper $stocktransper)
	{
		//StockTransper::update($request->all());
		$stocktransper = StockTransper::find($stocktransper->id);
		$stocktransper->project_id = $request->project_id;
		$stocktransper->warehouse_id = $request->warehouse_id;
		$stocktransper->transper_date = $request->transper_date;
		date_default_timezone_set("Asia/Dhaka");
		$stocktransper->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$stocktransper->updated_at = date('Y-m-d H:i:s');

		$stocktransper->save();

		return redirect()->route("stocktranspers.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(StockTransper $stocktransper)
	{
		$stocktransper->delete();
		return redirect()->route("stocktranspers.index")->with('success', 'Deleted Successfully.');
	}
}
