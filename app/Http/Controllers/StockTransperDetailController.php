<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StockTransperDetail;
use App\Models\StockTransper;
use App\Models\Product;
use App\Models\Uom;
use App\Models\TransactionType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class StockTransperDetailController extends Controller
{
	public function index()
	{
		$stocktransperdetails = StockTransperDetail::with(['transper', 'product', 'uom', 'transactionType'])->paginate(10);
		return view("pages.stocktransperdetail.index", ["stocktransperdetails" => $stocktransperdetails]);
	}

	public function create()
	{
		return view("pages.stocktransperdetail.create", ["transpers" => StockTransper::all(), "products" => Product::all(), "uom" => Uom::all(), "transaction_types" => TransactionType::all()]);
	}
	public function store(Request $request)
	{
		//StockTransperDetail::create($request->all());
		$stocktransperdetail = new StockTransperDetail;
		$stocktransperdetail->transper_id = $request->transper_id;
		$stocktransperdetail->product_id = $request->product_id;
		$stocktransperdetail->uom_id = $request->uom_id;
		$stocktransperdetail->qty = $request->qty;
		$stocktransperdetail->price = $request->price;
		$stocktransperdetail->transaction_type_id = $request->transaction_type_id;
		date_default_timezone_set("Asia/Dhaka");
		$stocktransperdetail->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$stocktransperdetail->updated_at = date('Y-m-d H:i:s');

		$stocktransperdetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$stocktransperdetail = StockTransperDetail::find($id);
		return view("pages.stocktransperdetail.show", ["stocktransperdetail" => $stocktransperdetail]);
	}
	public function edit(StockTransperDetail $stocktransperdetail)
	{
		return view("pages.stocktransperdetail.edit", ["stocktransperdetail" => $stocktransperdetail, "transpers" => StockTransper::all(), "products" => Product::all(), "uom" => Uom::all(), "transaction_types" => TransactionType::all()]);
	}
	public function update(Request $request, StockTransperDetail $stocktransperdetail)
	{
		//StockTransperDetail::update($request->all());
		$stocktransperdetail = StockTransperDetail::find($stocktransperdetail->id);
		$stocktransperdetail->transper_id = $request->transper_id;
		$stocktransperdetail->product_id = $request->product_id;
		$stocktransperdetail->uom_id = $request->uom_id;
		$stocktransperdetail->qty = $request->qty;
		$stocktransperdetail->price = $request->price;
		$stocktransperdetail->transaction_type_id = $request->transaction_type_id;
		date_default_timezone_set("Asia/Dhaka");
		$stocktransperdetail->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$stocktransperdetail->updated_at = date('Y-m-d H:i:s');

		$stocktransperdetail->save();

		return redirect()->route("stocktransperdetails.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(StockTransperDetail $stocktransperdetail)
	{
		$stocktransperdetail->delete();
		return redirect()->route("stocktransperdetails.index")->with('success', 'Deleted Successfully.');
	}
}
