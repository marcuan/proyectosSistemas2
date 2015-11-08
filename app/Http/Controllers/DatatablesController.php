<?php

namespace RED\Http\Controllers;

use Illuminate\Http\Request;
use yajra\Datatables\Datatables;

use RED\Http\Requests;
use RED\Http\Controllers\Controller;

use RED\Despensa\Producto;

class DatatablesController extends Controller
{
    /**
 * Displays datatables front end view
 *
 * @return \Illuminate\View\View
 */
public function getIndex()
{
    return view('datatables.index');
}

/**
 * Process datatables ajax request.
 *
 * @return \Illuminate\Http\JsonResponse
 */
public function anyData()
{
    return Datatables::of(Producto::select('*'))->make(true);
}
}
