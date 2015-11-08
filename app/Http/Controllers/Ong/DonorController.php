<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
use RED\Ong\Donor;
use RED\Ong\Donation;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        
        if($request->get('type') == "nombre")
        {
            if($request->get('active') == "activos")
            {
                $donor = Donor::name($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $donor = Donor::name($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $donor = Donor::name($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }
        }
        else if($request->get('type') == "e_mail")
        {
            if($request->get('active') == "activos")
            {
                $donor = Donor::code($request->get('name'))->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "inhabilitados")
            {
                $donor = Donor::code($request->get('name'))->onlyTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            if($request->get('active') == "todos")
            {
                $donor = Donor::code($request->get('name'))->withTrashed()->orderBy('id','DESC')->paginate(10);    
            }
            
        }
        else 
        {
            $donor = Donor::orderBy('id','DESC')->paginate(10);
        }

        return view('Ong.donor.index',compact('donor'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Ong.donor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $donor = Donor::create($request->all());

    return redirect('/donantes')->with('message','store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $donor = Donor::find($id);
        $donations = Donation::all();
        return view('Ong.donor.assign', compact(['donations', 'donor']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $donor = Donor::find($id);
        return view('Ong.donor.edit', compact(['donor']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $donor = Donor::find($id);
        $donor->fill($request->all());
        $donor->save();

    return redirect('/donantes')->with('message','edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $donor = Donor::find($id);
        $donor->delete();  

    return redirect('/donantes')->with('message','erase');
    }
}
