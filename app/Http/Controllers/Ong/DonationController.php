<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
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
        $donation = Donation::all();
        return view('Ong.donation.index',compact('donation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Ong.donation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        Donation::create($request->all());

    return redirect('/donaciones')->with('message','store');
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
        return view('Ong.donation.assign', compact(['donations']));
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

     return redirect('/donaciones')->with('message','edit');
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

    return redirect('/donaciones')->with('message','erase');
    }
}
