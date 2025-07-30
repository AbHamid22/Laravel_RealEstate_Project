<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StockAdjustmentDetail;
use App\Models\StockAdjustment;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StockAdjustmentDetailController extends Controller{
	public function index(){
		$stockadjustmentdetails = StockAdjustmentDetail::paginate(10);
		return view("pages.stockadjustmentdetail.index",["stockadjustmentdetails"=>$stockadjustmentdetails]);
	}
	public function create(){
		return view("pages.stockadjustmentdetail.create",["adjustments"=>StockAdjustment::all(),"products"=>Product::all()]);
	}
	public function store(Request $request){
		//StockAdjustmentDetail::create($request->all());
		$stockadjustmentdetail = new StockAdjustmentDetail;
		$stockadjustmentdetail->adjustment_id=$request->adjustment_id;
		$stockadjustmentdetail->product_id=$request->product_id;
		$stockadjustmentdetail->qty=$request->qty;
		$stockadjustmentdetail->price=$request->price;

		$stockadjustmentdetail->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$stockadjustmentdetail = StockAdjustmentDetail::find($id);
		return view("pages.stockadjustmentdetail.show",["stockadjustmentdetail"=>$stockadjustmentdetail]);
	}
	public function edit(StockAdjustmentDetail $stockadjustmentdetail){
		return view("pages.stockadjustmentdetail.edit",["stockadjustmentdetail"=>$stockadjustmentdetail,"adjustments"=>StockAdjustment::all(),"products"=>Product::all()]);
	}
	public function update(Request $request,StockAdjustmentDetail $stockadjustmentdetail){
		//StockAdjustmentDetail::update($request->all());
		$stockadjustmentdetail = StockAdjustmentDetail::find($stockadjustmentdetail->id);
		$stockadjustmentdetail->adjustment_id=$request->adjustment_id;
		$stockadjustmentdetail->product_id=$request->product_id;
		$stockadjustmentdetail->qty=$request->qty;
		$stockadjustmentdetail->price=$request->price;

		$stockadjustmentdetail->save();

		return redirect()->route("stockadjustmentdetails.index")->with('success','Updated Successfully.');
	}
	public function destroy(StockAdjustmentDetail $stockadjustmentdetail){
		$stockadjustmentdetail->delete();
		return redirect()->route("stockadjustmentdetails.index")->with('success', 'Deleted Successfully.');
	}
}
?>
