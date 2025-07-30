<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class OrderController extends Controller{
	public function index(){
	$orders = Order::with('customer')->paginate(5);
		return view("pages.order.index",["orders"=>$orders]);
	}
	public function create(){
		return view("pages.order.create",["customers"=>Customer::all()]);
	}
	public function store(Request $request){
		//Order::create($request->all());
		$order = new Order;
		$order->customer_id=$request->customer_id;
		$order->order_date=$request->order_date;
		$order->handover_date=$request->handover_date;
		$order->total_amount=$request->total_amount;
		$order->paid_amount=$request->paid_amount;
		$order->discount=$request->discount;
date_default_timezone_set("Asia/Dhaka");
		$order->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$order->updated_at=date('Y-m-d H:i:s');

		$order->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$order = Order::find($id);
		return view("pages.order.show",["order"=>$order]);
	}
	public function edit(Order $order){
		return view("pages.order.edit",["order"=>$order,"customers"=>Customer::all()]);
	}
	public function update(Request $request,Order $order){
		//Order::update($request->all());
		$order = Order::find($order->id);
		$order->customer_id=$request->customer_id;
		$order->order_date=$request->order_date;
		$order->handover_date=$request->handover_date;
		$order->total_amount=$request->total_amount;
		$order->paid_amount=$request->paid_amount;
		$order->discount=$request->discount;
date_default_timezone_set("Asia/Dhaka");
		$order->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$order->updated_at=date('Y-m-d H:i:s');

		$order->save();

		return redirect()->route("orders.index")->with('success','Updated Successfully.');
	}
	public function destroy(Order $order){
		$order->delete();
		return redirect()->route("orders.index")->with('success', 'Deleted Successfully.');
	}
}
?>
