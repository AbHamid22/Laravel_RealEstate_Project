<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MoneyReceiptDetail;
use App\Models\MoneyReceipt;
use App\Models\Property;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MoneyReceiptDetailController extends Controller
{
	public function index()
	{
		$moneyreceiptdetails = MoneyReceiptDetail::with(['moneyReceipt', 'property'])->paginate(5);
		return view("pages.moneyreceiptdetail.index", ["moneyreceiptdetails" => $moneyreceiptdetails]);
	}

	public function create()
	{
		return view("pages.moneyreceiptdetail.create", ["money_receipts" => MoneyReceipt::all(), "propertys" => Property::all()]);
	}
	public function store(Request $request)
	{
		//MoneyReceiptDetail::create($request->all());
		$moneyreceiptdetail = new MoneyReceiptDetail;
		$moneyreceiptdetail->money_receipt_id = $request->money_receipt_id;
		$moneyreceiptdetail->property_id = $request->property_id;
		$moneyreceiptdetail->amount = $request->amount;
		$moneyreceiptdetail->flat_no = $request->flat_no;

		$moneyreceiptdetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$moneyreceiptdetail = MoneyReceiptDetail::find($id);
		return view("pages.moneyreceiptdetail.show", ["moneyreceiptdetail" => $moneyreceiptdetail]);
	}
	public function edit(MoneyReceiptDetail $moneyreceiptdetail)
	{
		return view("pages.moneyreceiptdetail.edit", ["moneyreceiptdetail" => $moneyreceiptdetail, "money_receipts" => MoneyReceipt::all(), "propertys" => Property::all()]);
	}
	public function update(Request $request, MoneyReceiptDetail $moneyreceiptdetail)
	{
		//MoneyReceiptDetail::update($request->all());
		$moneyreceiptdetail = MoneyReceiptDetail::find($moneyreceiptdetail->id);
		$moneyreceiptdetail->money_receipt_id = $request->money_receipt_id;
		$moneyreceiptdetail->property_id = $request->property_id;
		$moneyreceiptdetail->amount = $request->amount;
		$moneyreceiptdetail->flat_no = $request->flat_no;

		$moneyreceiptdetail->save();

		return redirect()->route("moneyreceiptdetails.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(MoneyReceiptDetail $moneyreceiptdetail)
	{
		$moneyreceiptdetail->delete();
		return redirect()->route("moneyreceiptdetails.index")->with('success', 'Deleted Successfully.');
	}
}
