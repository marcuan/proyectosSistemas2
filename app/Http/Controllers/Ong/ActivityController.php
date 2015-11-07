<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
use RED\Http\Requests;
use RED\Ong\Activity;
use RED\Http\Controllers\Controller;

class ActivityController extends Controller{

	public function index(Request $request){
       if($request->get('type') == "nombre")
        {
            $activities = Activity::name($request->get('name'))->orderBy('id','DESC')->paginate(10);    
        }
        else if($request->get('type') == "address")
        {
            $activities = Activity::address($request->get('address'))->orderBy('id','DESC')->paginate(10);             
        }
        else 
        {
            $activities = Activity::orderBy('id','DESC')->paginate(10);
        }
		return view('Ong.activity.index', compact('activities'));
	}

	public function create(){
		return view('Ong.activity.create');
	}

	public function store(Request $request){
		$activity = Activity::create($request->all());
		return redirect('/actividades')->with('message', 'store');
	}
	public function show($id)
    {
        $activity = Activity::find($id);
        return view('Ong.activity.assign', compact(['donor']));
    }

	public function edit($id){
		$activity = Activity::find($id);
		return view('Ong.activity.edit', compact(['activity']));
	}

	public function update(Request $request, $id){
		$activity = Activity::find($id);
        $activity->fill($request->all());
        $activity->save();

    	return redirect('/actividades')->with('message','edit');
	}

	public function destroy($id){
		$activity = Activity::find($id);
		$Activity->delete();
		return redirect ('/actividades')->with('message', 'erase');
	}

}
