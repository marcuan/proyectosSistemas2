<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
use RED\Ong\Donor;
use RED\Ong\Donation;
use RED\Http\Requests;  
use RED\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $this->authorize('listar', new Donation());

        if($request->get('type') == "created_at")
        {
            $donation = Donation::code($request->get('name'))->orderBy('created_at','DESC')->paginate(100);
        }else
        {
            $donation = Donation::all();
        }
        $donor = Donor::all();
        return view('Ong.donation.index',compact(['donation', 'donor']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id = 0)
    {
        $this->authorize('crear', new Donation());

        return view('Ong.donation.create', compact('id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->authorize('crear', new Donation());

        Donation::create($request->all());

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
        $donation = Donation::find($id);
        return view('Ong.donation.assign', compact(['donation']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $donation = Donation::find($id);
        return view('Ong.donation.edit', ['donation']);
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
        $donation = Donation::find($id);
        $donation->fill($request->all());
        $donation->save();

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
        $donation = Donation::find($id);
        $donation->delete();  

    return redirect('/donantes')->with('message','erase');
    }
}
