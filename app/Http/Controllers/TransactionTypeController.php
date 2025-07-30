<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\TransactionType;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class TransactionTypeController extends Controller{
	public function index(){
		$transactiontypes = TransactionType::paginate(10);
		return view("pages.transactiontype.index",["transactiontypes"=>$transactiontypes]);
	}
	public function create(){
		return view("pages.transactiontype.create",[]);
	}
	public function store(Request $request){
		//TransactionType::create($request->all());
		$transactiontype = new TransactionType;
		$transactiontype->name=$request->name;

		$transactiontype->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$transactiontype = TransactionType::find($id);
		return view("pages.transactiontype.show",["transactiontype"=>$transactiontype]);
	}
	public function edit(TransactionType $transactiontype){
		return view("pages.transactiontype.edit",["transactiontype"=>$transactiontype,]);
	}
	public function update(Request $request,TransactionType $transactiontype){
		//TransactionType::update($request->all());
		$transactiontype = TransactionType::find($transactiontype->id);
		$transactiontype->name=$request->name;

		$transactiontype->save();

		return redirect()->route("transactiontypes.index")->with('success','Updated Successfully.');
	}
	public function destroy(TransactionType $transactiontype){
		$transactiontype->delete();
		return redirect()->route("transactiontypes.index")->with('success', 'Deleted Successfully.');
	}
}
?>
