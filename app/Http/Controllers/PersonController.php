<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Person;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class PersonController extends Controller{
	public function index(){
		$persons = Person::paginate(10);
		return view("pages.person.index",["persons"=>$persons]);
	}
	public function create(){
		return view("pages.person.create",[]);
	}
	public function store(Request $request){
		//Person::create($request->all());
		$person = new Person;
		$person->name=$request->name;
		$person->positon=$request->positon;
		if(isset($request->photo)){
			$person->photo=$request->photo;
		}
		$person->address=$request->address;
		$person->contact=$request->contact;

		$person->save();
		if(isset($request->photo)){
			$imageName=$person->id.'.'.$request->photo->extension();
			$person->photo=$imageName;
			$person->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$person = Person::find($id);
		return view("pages.person.show",["person"=>$person]);
	}
	public function edit(Person $person){
		return view("pages.person.edit",["person"=>$person,]);
	}
	public function update(Request $request,Person $person){
		//Person::update($request->all());
		$person = Person::find($person->id);
		$person->name=$request->name;
		$person->positon=$request->positon;
		if(isset($request->photo)){
			$person->photo=$request->photo;
		}
		$person->address=$request->address;
		$person->contact=$request->contact;

		$person->save();
		if(isset($request->photo)){
			$imageName=$person->id.'.'.$request->photo->extension();
			$person->photo=$imageName;
			$person->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("persons.index")->with('success','Updated Successfully.');
	}
	public function destroy(Person $person){
		$person->delete();
		return redirect()->route("persons.index")->with('success', 'Deleted Successfully.');
	}
}
?>
