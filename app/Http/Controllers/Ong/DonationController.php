<?php

namespace RED\Http\Controllers\Ong;

use Illuminate\Http\Request;
use RED\Ong\Donation;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class DonationController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('Ong.Donation.create');
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

    return redirect('/donation')->with('message','store');
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
        return view('Ong.Donation.edit', ['donation'=>$donation]);
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

     return redirect('/donation')->with('message','edit');
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

    return redirect('/donation')->with('message','erase');
    }
}
