<?php

namespace RED\Despensa;

use Illuminate\Database\Eloquent\Model;

class DetalleConsignacion extends Model
{
   protected $table = 'DetalleConsignacion';
    protected $fillable = [
	'consignacion_id',
	'cantidad',
	'precio',
	'producto_id'	
	];
	
    public function consignacion()
    {
    	return $this->hasMany('RED\Consignacion','consignacion_id'); 
	}
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
