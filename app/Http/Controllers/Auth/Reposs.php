<?php

namespace RED\Http\Controllers;

use Illuminate\Http\Request;
use RED\Http\Requests;
use RED\Http\Controllers\Controller;

class Reposs extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "modo index";
    }

    function encap()
    {
    // llamar a una vista 
     return "llegada a controlador, Controller/auth/Reposs";

    }
//
   
}