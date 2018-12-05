<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Altadetalle extends Model
{

	use Notifiable;

    use Softdeletes;
    
    public static $rules = [
        'fecha' => 'required|date',
        'proveedor' => 'required|string|max:255',
        'ordendecompra' => 'required|string|max:255',
        'factura' => 'required|numeric|digits:4',
   
        'observaciones' => 'string|max:255'

    ];

    public static $messages = [
    	'fecha.required' => 'Es necesario ingresar la fecha de adquisicion.',
    	'proveedor.required' => 'Es necesario ingresar el proveedor del bien.',
        'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
        'factura.required' => 'Es necesario ingresar la factura del bien.',


    ];

    protected $fillable = [
        'fecha', 'proveedor','ordendecompra', 'factura'
    ];

}
