<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Customer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class CustomerController extends Controller{
	public function index(){
		$customers = Customer::paginate(10);
		return view("pages.customer.index",["customers"=>$customers]);
	}
	public function create(){
		return view("pages.customer.create",[]);
	}
	public function store(Request $request){
		//Customer::create($request->all());
		$customer = new Customer;
		if(isset($request->photo)){
			$customer->photo=$request->photo;
		}
		$customer->name=$request->name;
		$customer->email=$request->email;
		$customer->phone=$request->phone;
		$customer->type=$request->type;
date_default_timezone_set("Asia/Dhaka");
		$customer->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$customer->updated_at=date('Y-m-d H:i:s');

		$customer->save();
		if(isset($request->photo)){
			$imageName=$customer->id.'.'.$request->photo->extension();
			$customer->photo=$imageName;
			$customer->update();
			$request->photo->move(public_path('img/customers'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$customer = Customer::find($id);
		return view("pages.customer.show",["customer"=>$customer]);
	}
	public function edit(Customer $customer){
		return view("pages.customer.edit",["customer"=>$customer,]);
	}
	public function update(Request $request,Customer $customer){
		//Customer::update($request->all());
		$customer = Customer::find($customer->id);
		if(isset($request->photo)){
			$customer->photo=$request->photo;
		}
		$customer->name=$request->name;
		$customer->email=$request->email;
		$customer->phone=$request->phone;
		$customer->type=$request->type;
date_default_timezone_set("Asia/Dhaka");
		$customer->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$customer->updated_at=date('Y-m-d H:i:s');

		$customer->save();
		if(isset($request->photo)){
			$imageName=$customer->id.'.'.$request->photo->extension();
			$customer->photo=$imageName;
			$customer->update();
			$request->photo->move(public_path('img/customers'),$imageName);
		}

		return redirect()->route("customers.index")->with('success','Updated Successfully.');
	}
	public function destroy(Customer $customer){
		$customer->delete();
		return redirect()->route("customers.index")->with('success', 'Deleted Successfully.');
	}
}
?>
