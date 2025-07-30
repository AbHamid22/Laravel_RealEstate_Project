<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class InvoiceController extends Controller{
	public function index(){
		$query=Invoice::with(['customer']);
		$invoices = $query->orderBy('id', 'desc')->paginate(5);
		return view("pages.Invoice.invoice.index",["invoices"=>$invoices]);
	}
	public function create(){
		return view("pages.Invoice.invoice.create",["customers"=>Customer::all()]);
	}

	
	public function store(Request $request){
		//Invoice::create($request->all());
		$invoice = new Invoice;
		$invoice->customer_id=$request->customer_id;
		$invoice->total_amount=$request->total_amount;
		$invoice->status=$request->status;
		$invoice->issue_date=$request->issue_date;
		$invoice->due_date=$request->due_date;
date_default_timezone_set("Asia/Dhaka");
		$invoice->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$invoice->updated_at=date('Y-m-d H:i:s');

		$invoice->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$invoice = Invoice::find($id);
		return view("pages.Invoice.invoice.show",["invoice"=>$invoice]);
	}
	public function edit(Invoice $invoice){
		return view("pages.Invoice.invoice.edit",["invoice"=>$invoice,"customers"=>Customer::all()]);
	}
	public function update(Request $request,Invoice $invoice){
		//Invoice::update($request->all());
		$invoice = Invoice::find($invoice->id);
		$invoice->customer_id=$request->customer_id;
		$invoice->total_amount=$request->total_amount;
		$invoice->status=$request->status;
		$invoice->issue_date=$request->issue_date;
		$invoice->due_date=$request->due_date;
date_default_timezone_set("Asia/Dhaka");
		$invoice->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$invoice->updated_at=date('Y-m-d H:i:s');

		$invoice->save();

		return redirect()->route("invoices.index")->with('success','Updated Successfully.');
	}
	public function destroy(Invoice $invoice){
		$invoice->delete();
		return redirect()->route("invoices.index")->with('success', 'Deleted Successfully.');
	}
}
?>
