<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
use RED\Http\Request;

class NewActivity estends Controller{

	public function index(){

	}

	public function create(){


	}

	public function store(Request $request){
		$activity = Activity::find($request['id_Activity']);

	}

	public function show($id){

	}

	public function edit($id){

	}

	public function update(Request $request, $id){

	}

	public function destroy($id){

	}

}
