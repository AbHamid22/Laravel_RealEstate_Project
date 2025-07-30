<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Agent;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
class AgentController extends Controller{
	public function index(){
		$agents = Agent::paginate(10);
		return view("pages.agent.index",["agents"=>$agents]);
	}
	public function create(){
		return view("pages.agent.create",[]);
	}
	public function store(Request $request){
		//Agent::create($request->all());
		$agent = new Agent;
		if(isset($request->photo)){
			$agent->photo=$request->photo;
		}
		$agent->name=$request->name;
		$agent->email=$request->email;
		$agent->phone=$request->phone;
date_default_timezone_set("Asia/Dhaka");
		$agent->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$agent->updated_at=date('Y-m-d H:i:s');

		$agent->save();
		if(isset($request->photo)){
			$imageName=$agent->id.'.'.$request->photo->extension();
			$agent->photo=$imageName;
			$agent->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return back()->with('success', 'Created Successfully.');
	}
	public function show($id){
		$agent = Agent::find($id);
		return view("pages.agent.show",["agent"=>$agent]);
	}
	public function edit(Agent $agent){
		return view("pages.agent.edit",["agent"=>$agent,]);
	}
	public function update(Request $request,Agent $agent){
		//Agent::update($request->all());
		$agent = Agent::find($agent->id);
		if(isset($request->photo)){
			$agent->photo=$request->photo;
		}
		$agent->name=$request->name;
		$agent->email=$request->email;
		$agent->phone=$request->phone;
date_default_timezone_set("Asia/Dhaka");
		$agent->created_at=date('Y-m-d H:i:s');
date_default_timezone_set("Asia/Dhaka");
		$agent->updated_at=date('Y-m-d H:i:s');

		$agent->save();
		if(isset($request->photo)){
			$imageName=$agent->id.'.'.$request->photo->extension();
			$agent->photo=$imageName;
			$agent->update();
			$request->photo->move(public_path('img'),$imageName);
		}

		return redirect()->route("agents.index")->with('success','Updated Successfully.');
	}
	public function destroy(Agent $agent){
		$agent->delete();
		return redirect()->route("agents.index")->with('success', 'Deleted Successfully.');
	}
}
?>
