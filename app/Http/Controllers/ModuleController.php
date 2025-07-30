<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Module;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class ModuleController extends Controller{
	public function index(){
		$modules = Module::paginate(10);
		return view("pages.module.index",["modules"=>$modules]);
	}
	public function create(){
		return view("pages.module.create",[]);
	}
	public function store(Request $request){
		//Module::create($request->all());
		$module = new Module;
		$module->name=$request->name;

		$module->save();

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$module = Module::find($id);
		return view("pages.module.show",["module"=>$module]);
	}
	public function edit(Module $module){
		return view("pages.module.edit",["module"=>$module,]);
	}
	public function update(Request $request,Module $module){
		//Module::update($request->all());
		$module = Module::find($module->id);
		$module->name=$request->name;

		$module->save();

		return redirect()->route("modules.index")->with('success','Updated Successfully.');
	}
	public function destroy(Module $module){
		$module->delete();
		return redirect()->route("modules.index")->with('success', 'Deleted Successfully.');
	}
}
?>
