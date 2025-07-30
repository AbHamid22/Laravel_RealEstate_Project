<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InvoiceDetail;
use App\Models\Invoice;
use App\Models\Property;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class InvoiceDetailController extends Controller
{
	public function index()
	{
		$invoicedetails = InvoiceDetail::paginate(5);
		return view("pages.Invoice.invoicedetail.index", ["invoicedetails" => $invoicedetails]);
	}
	public function create()
	{
		return view("pages.Invoice.invoicedetail.create", ["invoices" => Invoice::all(), "propertys" => Property::all()]);
	}

	public function store(Request $request)
	{
		//InvoiceDetail::create($request->all());
		$invoicedetail = new InvoiceDetail;
		$invoicedetail->invoice_id = $request->invoice_id;
		$invoicedetail->property_id = $request->property_id;
		$invoicedetail->total_amount = $request->total_amount;
		$invoicedetail->createt_at = $request->createt_at;
		date_default_timezone_set("Asia/Dhaka");
		$invoicedetail->updated_at = date('Y-m-d H:i:s');

		$invoicedetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id)
	{
		$invoicedetail = InvoiceDetail::find($id);
		return view("pages.Invoice.invoicedetail.show", ["invoicedetail" => $invoicedetail]);
	}
	public function edit(InvoiceDetail $invoicedetail)
	{
		return view("pages.Invoice.invoicedetail.edit", ["invoicedetail" => $invoicedetail, "invoices" => Invoice::all(), "propertys" => Property::all()]);
	}
	public function update(Request $request, InvoiceDetail $invoicedetail)
	{
		//InvoiceDetail::update($request->all());
		$invoicedetail = InvoiceDetail::find($invoicedetail->id);
		$invoicedetail->invoice_id = $request->invoice_id;
		$invoicedetail->property_id = $request->property_id;
		$invoicedetail->total_amount = $request->total_amount;
		$invoicedetail->createt_at = $request->createt_at;
		date_default_timezone_set("Asia/Dhaka");
		$invoicedetail->updated_at = date('Y-m-d H:i:s');

		$invoicedetail->save();

		return redirect()->route("invoicedetails.index")->with('success', 'Updated Successfully.');
	}
	public function destroy(InvoiceDetail $invoicedetail)
	{
		$invoicedetail->delete();
		return redirect()->route("invoicedetails.index")->with('success', 'Deleted Successfully.');
	}
}
