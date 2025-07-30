<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Company;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class CompanyController extends Controller{
	public function index(){
		$companys = Company::paginate(10);
		return view("pages.erp.company.index",["companys"=>$companys]);
	}
	public function create(){
		return view("pages.erp.company.create",[]);
	}
	public function store(Request $request){
		//Company::create($request->all());
		$company = new Company;
		$company->name=$request->name;
		$company->mobile=$request->mobile;
		$company->bin=$request->bin;
		$company->email=$request->email;
		$company->website=$request->website;
		$company->city=$request->city;
		$company->area=$request->area;
		$company->street_address=$request->street_address;
		$company->post_code=$request->post_code;
		$company->inactive=$request->inactive;
		$company->logo=$request->logo;

		$company->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$company = Company::find($id);
		return view("pages.erp.company.show",["company"=>$company]);
	}
	public function edit(Company $company){
		return view("pages.erp.company.edit",["company"=>$company,]);
	}
	public function update(Request $request,Company $company){
		//Company::update($request->all());
		$company = Company::find($company->id);
		$company->name=$request->name;
		$company->mobile=$request->mobile;
		$company->bin=$request->bin;
		$company->email=$request->email;
		$company->website=$request->website;
		$company->city=$request->city;
		$company->area=$request->area;
		$company->street_address=$request->street_address;
		$company->post_code=$request->post_code;
		$company->inactive=$request->inactive;
		$company->logo=$request->logo;

		$company->save();

		return redirect()->route("companys.index")->with('success','Updated Successfully.');
	}
	public function destroy(Company $company){
		$company->delete();
		return redirect()->route("companys.index")->with('success', 'Deleted Successfully.');
	}
}
?>
