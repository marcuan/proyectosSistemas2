<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
use RED\Http\Request;

class NewActivity estends Controller{

	public function index(Request $request){
       if($request->get('type') == "nombre")
        {
            $activities = Activity::name($request->get('name'))->orderBy('id','DESC')->paginate(10);    
        }
        else if($request->get('type') == "place")
        {
            $activities = Activity::place($request->get('place'))->orderBy('id','DESC')->paginate(10);             
        }
        else 
        {
            $activities = Activity::orderBy('id','DESC')->paginate(10);
        }
		return view('Ong.Activity.index', compact('activities'));
	}

	public function create(){
		return view('Ong.Activity.create');
	}

	public function store(Request $request){
		Antivity::create($request->all());
		return redirect('/activity')->with('message', 'store');
	}

	public function show($id){
		$activity = Activity::find($id);
		return view('Ong.activity.assign',compact(['activity']));
	}

	public function edit($id){
		$activity = Activity::find($id);
		return view('Ong.activity.edit', compact(['activity']));
	}

	public function update($id){
		$activity = Activity::find($id);
	}

	public function destroy($id){
		$activity = Activity::find($id);
		$Activity->delete();
		return redirect ('/Activity')->with('message', 'erase');
	}

}
