<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Inventariable extends Model
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
        'especie_id' => 'required',

        'descripcionbien' => 'string|max:255',
        'costo_incorporacion' => 'required|numeric',
        'observaciones' => 'string|max:255',
        'ubicacion_id' => 'required',
        'subicacion_id' => 'required',

        'estado_conservacion' => 'required'
    ];

    public static $messages = [
        'descripcionbien.required' => 'Es necesario ingresar la descripcion del bien.',
    	'fecha.required' => 'Es necesario ingresar la fecha de adquisicion.',
    	'proveedor.required' => 'Es necesario ingresar el proveedor del bien.',
        'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
        'factura.required' => 'Es necesario ingresar la factura del bien.',

        //Codigo asignado
        'grupo_id.required' => 'Es necesario ingresar el grupo del bien.',
        'subgrupo_id.required' => 'Es necesario ingresar el subgrupo del bien.',
        'especie_id.required' => 'Es necesario ingresar la especie del bien.',
        'estado_conservacion.required' => 'Es necesario ingresar el estado de conservacion.',

        'cantidad.required' => 'Es necesario ingresar la cantidad del bien.',
        'descripcionbien.required' => 'Es necesario ingresar la descripcion del bien.',
        'costo_incorporacion.required' => 'Es necesario ingresar el costo del bien.',
        'estado_conservacion.required' => 'Es necesario ingresar estado del bien.',
        'ubicacion_id.required' => 'Es necesario ingresar la ubicacion a la que pertenece.',
        'sububicacion_id.required' => 'Es necesario ingresar la sub ubicacion a la que pertenece.',

        'estado_conservacion.required' => 'Es necesario ingresar el estado de conservacion del bien.',

    ];

    protected $fillable = [
        'fecha', 'proveedor','ordendecompra', 'factura','grupo_id', 'subgrupo_id', 'especie_id', 'descripcionbien', 'costo_incorporacion', 'ubicacion_id', 'sububicacion_id','altaesp_id', 'estado_conservacion', 'usuario'
    ];

    public function altaesp()
    {
        return $this->belongsTo('SisInventario\Altaesp');
    }

    public function scopeDescripcionbien($query, $descripcionbien)
    {
        if($descripcionbien) 
            return $query->where('descripcionbien', 'LIKE', "%$descripcionbien%");   
    }

    public function scopeUbicacion_id($query, $ubicacion_id)
    {
        if($ubicacion_id) 
            return $query->where('ubicacion_id', 'LIKE', "%$ubicacion_id%");   
    } 

    public function scopeSububicacion_id($query, $sububicacion_id)
    {
        if($sububicacion_id) 
            return $query->where('sububicacion_id', 'LIKE', "%$sububicacion_id%");   
    } 


    public function scopeSearch($query, $u){
            return $query->where('ubicacion_id', 'like', "%" .$u. '%');   
    }

    public function scopeSearch2($query, $s){
            return $query->where('sububicacion_id', 'like', "%" .$s. '%');   
    } 


}
