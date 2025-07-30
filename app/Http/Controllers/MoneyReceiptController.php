<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MoneyReceipt;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MoneyReceiptController extends Controller
{
	public function index()
	{
		// $moneyreceipts = MoneyReceipt::with('customer')->paginate(5);
		$query=MoneyReceipt::with(['customer']);
		$moneyreceipts = $query->orderBy('id', 'desc')->paginate(5);
		return view("pages.moneyreceipt.index", ["moneyreceipts" => $moneyreceipts]);
	}

	public function create(Request $request)
	{
		$invoice_id = $request->query('invoice_id');
		return view("pages.moneyreceipt.create", [
			"customers" => Customer::all(),
			"invoice_id" => $invoice_id
		]);
	}
	public function store(Request $request)
	{
		//MoneyReceipt::create($request->all());
		$moneyreceipt = new MoneyReceipt;
		$moneyreceipt->customer_id = $request->customer_id;
		$moneyreceipt->remark = $request->remark;
		$moneyreceipt->receipt_total = $request->receipt_total;
		$moneyreceipt->discount = $request->discount;
		$moneyreceipt->vat = $request->vat;
		date_default_timezone_set("Asia/Dhaka");
		$moneyreceipt->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$moneyreceipt->updated_at = date('Y-m-d H:i:s');

		$moneyreceipt->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$moneyreceipt = MoneyReceipt::find($id);
		return view("pages.moneyreceipt.show", ["moneyreceipt" => $moneyreceipt]);
	}
	public function edit(MoneyReceipt $moneyreceipt)
	{
		return view("pages.moneyreceipt.edit", ["moneyreceipt" => $moneyreceipt, "customers" => Customer::all()]);
	}
	public function update(Request $request, MoneyReceipt $moneyreceipt)
	{
		//MoneyReceipt::update($request->all());
		$moneyreceipt = MoneyReceipt::find($moneyreceipt->id);
		$moneyreceipt->customer_id = $request->customer_id;
		$moneyreceipt->remark = $request->remark;
		$moneyreceipt->receipt_total = $request->receipt_total;
		$moneyreceipt->discount = $request->discount;
		$moneyreceipt->vat = $request->vat;
		date_default_timezone_set("Asia/Dhaka");
		$moneyreceipt->created_at = date('Y-m-d H:i:s');
		date_default_timezone_set("Asia/Dhaka");
		$moneyreceipt->updated_at = date('Y-m-d H:i:s');

		$moneyreceipt->save();

		return redirect()->route("moneyreceipts.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(MoneyReceipt $moneyreceipt)
	{
		$moneyreceipt->delete();
		return redirect()->route("moneyreceipts.index")->with('success', 'Deleted Successfully.');
	}
}
