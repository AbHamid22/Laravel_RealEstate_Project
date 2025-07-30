<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Supplier;
use App\Models\Status;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class PurchaseController extends Controller{
	public function index(){
		   $purchases = Purchase::with(['supplier', 'status'])->paginate(10);
		return view("pages.purchase.index",["purchases"=>$purchases]);
	}
	public function create(){
		return view("pages.purchase.create",["suppliers"=>Supplier::all(),"status"=>Status::all()]);
	}
	public function store(Request $request){
		//Purchase::create($request->all());
		$purchase = new Purchase;
		$purchase->supplier_id=$request->supplier_id;
		$purchase->purchase_date=$request->purchase_date;
		$purchase->delivery_date=$request->delivery_date;
		$purchase->shipping_address=$request->shipping_address;
		$purchase->purchase_total=$request->purchase_total;
		$purchase->paid_amount=$request->paid_amount;
		$purchase->remark=$request->remark;
		$purchase->status_id=$request->status_id;
		$purchase->discount=$request->discount;
		$purchase->vat=$request->vat;
date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at=date('Y-m-d H:i:s');

		$purchase->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$purchase = Purchase::find($id);
		return view("pages.purchase.show",["purchase"=>$purchase]);
	}
	public function edit(Purchase $purchase){
		return view("pages.purchase.edit",["purchase"=>$purchase,"suppliers"=>Supplier::all(),"status"=>Status::all()]);
	}
	public function update(Request $request,Purchase $purchase){
		//Purchase::update($request->all());
		$purchase = Purchase::find($purchase->id);
		$purchase->supplier_id=$request->supplier_id;
		// $purchase->purchase_date=2025-10-11;
		// $purchase->delivery_date=2025-10-10;
		$purchase->shipping_address=$request->shipping_address;
		$purchase->purchase_total=$request->purchase_total;
		$purchase->paid_amount=$request->paid_amount;
		$purchase->remark=$request->remark;
		$purchase->status_id=$request->status_id;
		$purchase->discount=$request->discount;
		$purchase->vat=$request->vat;
date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at=date('Y-m-d H:i:s');

		$purchase->save();

		return redirect()->route("purchases.index")->with('success','Updated Successfully.');
	}
	public function destroy(Purchase $purchase){
		$purchase->delete();
		return redirect()->route("purchases.index")->with('success', 'Deleted Successfully.');
	}
}
?>
