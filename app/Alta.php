<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Alta extends Model
{

	use Notifiable;

    use Softdeletes;
    
    public static $rules = [
        'fecha' => 'required|date',
        'proveedor' => 'required|string|max:255',
        'ordendecompra' => 'required|string|max:255',
        'factura' => 'required|numeric',

        //Codigo Asignado
        'grupo_id' => 'required',
        'subgrupo_id' => 'required',
        'especie' => 'required',
        'numero' => 'required',

        'cantidad' => 'required|numeric',
        'descripcionbien' => 'nullable|string|max:255',
        'preciounitario' => 'required|numeric',
        'observaciones' => 'string|max:255',
        'ubicacion_id' => 'required',
        'estado_conservacion' => 'required'
    ];

    public static $messages = [
    	'fecha.required' => 'Es necesario ingresar la fecha de adquisicion.',
    	'proveedor.required' => 'Es necesario ingresar el proveedor del bien.',
        'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
        'factura.required' => 'Es necesario ingresar la factura del bien.',

        //Codigo asignado
        'grupo_id.required' => 'Es necesario ingresar el grupo del bien.',
        'subgrupo_id.required' => 'Es necesario ingresar el subgrupo del bien.',
        'especie.required' => 'Es necesario ingresar la especie del bien.',
        'numero.required' => 'Es necesario ingresar el numero del bien.',
        'estado_conservacion.required' => 'Es necesario ingresar el estado del bien.',

        'cantidad.required' => 'Es necesario ingresar la cantidad del bien.',
        'descripcionbien.required' => 'Es necesario ingresar la descripcion del bien.',
        'preciounitario.required' => 'Es necesario ingresar el precio del bien.',
        'ubicacion_id.required' => 'Es necesario ingresar el destino del bien.'

    ];

    protected $fillable = [
        'fecha', 'proveedor','ordendecompra', 'factura','grupo_id', 'subgrupo_id', 'especie', 'numero','estado_conservacion','cantidad', 'descripcionbien', 'preciounitario', 'ubicacion_id'
    ];

    public function proveedores()
    {
        return $this->hasMany('sisInventario\Proveedor');
    }

    public function scopeDescripcionbien($query, $descripcionbien)
    {
        if($descripcionbien) 
            return $query->where('descripcionbien', 'LIKE', "%$descripcionbien%");   
    }      

}
