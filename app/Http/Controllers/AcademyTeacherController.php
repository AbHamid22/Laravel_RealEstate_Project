<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\AcademyTeacher;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class AcademyTeacherController extends Controller{
	public function index(){
		$academyteachers = AcademyTeacher::paginate(10);
		return view("pages.academyteacher.index",["academyteachers"=>$academyteachers]);
	}
	public function create(){
		return view("pages.academyteacher.create",[]);
	}
	public function store(Request $request){
		//AcademyTeacher::create($request->all());
		$academyteacher = new AcademyTeacher;
		$academyteacher->name=$request->name;
		$academyteacher->contact_no=$request->contact_no;
		$academyteacher->position=$request->position;

		$academyteacher->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$academyteacher = AcademyTeacher::find($id);
		return view("pages.academyteacher.show",["academyteacher"=>$academyteacher]);
	}
	public function edit(AcademyTeacher $academyteacher){
		return view("pages.academyteacher.edit",["academyteacher"=>$academyteacher,]);
	}
	public function update(Request $request,AcademyTeacher $academyteacher){
		//AcademyTeacher::update($request->all());
		$academyteacher = AcademyTeacher::find($academyteacher->id);
		$academyteacher->name=$request->name;
		$academyteacher->contact_no=$request->contact_no;
		$academyteacher->position=$request->position;

		$academyteacher->save();

		return redirect()->route("academyteachers.index")->with('success','Updated Successfully.');
	}
	public function destroy(AcademyTeacher $academyteacher){
		$academyteacher->delete();
		return redirect()->route("academyteachers.index")->with('success', 'Deleted Successfully.');
	}
}
?>
