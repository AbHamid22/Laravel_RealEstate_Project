<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Section;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class SectionController extends Controller{
	public function index(){
		$sections = Section::paginate(10);
		return view("pages.section.index",["sections"=>$sections]);
	}
	public function create(){
		return view("pages.section.create",[]);
	}
	public function store(Request $request){
		//Section::create($request->all());
		$section = new Section;
		$section->name=$request->name;
		$section->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$section->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$section->updated_at=date('Y-m-d H:i:s');

		$section->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$section = Section::find($id);
		return view("pages.section.show",["section"=>$section]);
	}
	public function edit(Section $section){
		return view("pages.section.edit",["section"=>$section,]);
	}
	public function update(Request $request,Section $section){
		//Section::update($request->all());
		$section = Section::find($section->id);
		$section->name=$request->name;
		$section->description=$request->description;
date_default_timezone_set("Asia/Dhaka");
		$section->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$section->updated_at=date('Y-m-d H:i:s');

		$section->save();

		return redirect()->route("sections.index")->with('success','Updated Successfully.');
	}
	public function destroy(Section $section){
		$section->delete();
		return redirect()->route("sections.index")->with('success', 'Deleted Successfully.');
	}
}
?>
