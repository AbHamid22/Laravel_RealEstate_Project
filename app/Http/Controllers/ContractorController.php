<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Contractor;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ContractorController extends Controller{
	public function index(){
		$contractors = Contractor::paginate(10);
		return view("pages.contractor.index",["contractors"=>$contractors]);
	}
	public function create(){
		return view("pages.contractor.create",[]);
	}
	public function store(Request $request){
		//Contractor::create($request->all());
		$contractor = new Contractor;
		if(isset($request->photo)){
			$contractor->photo=$request->photo;
		}
		$contractor->name=$request->name;
		$contractor->contact_info=$request->contact_info;
date_default_timezone_set("Asia/Dhaka");
		$contractor->created_at=date('Y-m-d H:i:s');

		$contractor->save();
		if(isset($request->photo)){
			$imageName=$contractor->id.'.'.$request->photo->extension();
			$contractor->photo=$imageName;
			$contractor->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$contractor = Contractor::find($id);
		return view("pages.contractor.show",["contractor"=>$contractor]);
	}
	public function edit(Contractor $contractor){
		return view("pages.contractor.edit",["contractor"=>$contractor,]);
	}
	public function update(Request $request,Contractor $contractor){
		//Contractor::update($request->all());
		$contractor = Contractor::find($contractor->id);
		if(isset($request->photo)){
			$contractor->photo=$request->photo;
		}
		$contractor->name=$request->name;
		$contractor->contact_info=$request->contact_info;
date_default_timezone_set("Asia/Dhaka");
		$contractor->created_at=date('Y-m-d H:i:s');

		$contractor->save();
		if(isset($request->photo)){
			$imageName=$contractor->id.'.'.$request->photo->extension();
			$contractor->photo=$imageName;
			$contractor->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("contractors.index")->with('success','Updated Successfully.');
	}
	public function destroy(Contractor $contractor){
		$contractor->delete();
		return redirect()->route("contractors.index")->with('success', 'Deleted Successfully.');
	}
}
?>
