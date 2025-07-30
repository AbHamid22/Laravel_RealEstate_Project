<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\StockAdjustment;
use App\Models\User;
use App\Models\StockAdjustmentType;
use App\Models\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class StockAdjustmentController extends Controller{
	public function index(){
		$stockadjustments = StockAdjustment::paginate(10);
		return view("pages.stockadjustment.index",["stockadjustments"=>$stockadjustments]);
	}
	public function create(){
		return view("pages.stockadjustment.create",["users"=>User::all(),"adjustment_types"=>StockAdjustmentType::all(),"warehouses"=>Warehouse::all()]);
	}
	public function store(Request $request){
		//StockAdjustment::create($request->all());
		$stockadjustment = new StockAdjustment;
		$stockadjustment->adjustment_at=$request->adjustment_at;
		$stockadjustment->user_id=$request->user_id;
		$stockadjustment->remark=$request->remark;
		$stockadjustment->adjustment_type_id=$request->adjustment_type_id;
		$stockadjustment->warehouse_id=$request->warehouse_id;

		$stockadjustment->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$stockadjustment = StockAdjustment::find($id);
		return view("pages.stockadjustment.show",["stockadjustment"=>$stockadjustment]);
	}
	public function edit(StockAdjustment $stockadjustment){
		return view("pages.stockadjustment.edit",["stockadjustment"=>$stockadjustment,"users"=>User::all(),"adjustment_types"=>StockAdjustmentType::all(),"warehouses"=>Warehouse::all()]);
	}
	public function update(Request $request,StockAdjustment $stockadjustment){
		//StockAdjustment::update($request->all());
		$stockadjustment = StockAdjustment::find($stockadjustment->id);
		$stockadjustment->adjustment_at=$request->adjustment_at;
		$stockadjustment->user_id=$request->user_id;
		$stockadjustment->remark=$request->remark;
		$stockadjustment->adjustment_type_id=$request->adjustment_type_id;
		$stockadjustment->warehouse_id=$request->warehouse_id;

		$stockadjustment->save();

		return redirect()->route("stockadjustments.index")->with('success','Updated Successfully.');
	}
	public function destroy(StockAdjustment $stockadjustment){
		$stockadjustment->delete();
		return redirect()->route("stockadjustments.index")->with('success', 'Deleted Successfully.');
	}
}
?>
