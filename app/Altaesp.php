<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Altaesp extends Model
{
    use Notifiable;

    use Softdeletes;

    public static $rules = [
        'grupo_id' => 'required|numeric',
        'subgrupo_id' => 'required',
        'especie_id' => 'required',
        'codificacion' => 'required|unique:altaesps|min:5',
        'descripcion' => 'required'
    ];

    public static $messages = [
        'grupo_id.required' => 'Es necesario ingresar el grupo a que pertenece.',
        'subgrupo_id.required' => 'Es necesario ingresar el subgrupo a que pertenece.',
        'especie_id.required' => 'Es necesario ingresar la especie.',
        'codificacion.required' => 'Es necesario completar los campos.',
        'codificacion.unique' => 'Esta especie ya se encuentra registrada.',
        'descripcion.required' => 'Es necesario ingresar la descripcion de la especie.'
    ];

    protected $fillable = [
        'grupo_id', 'subgrupo_id', 'especie_id', 'codificacion', 'descripcion'
    ];

    public function proveedores()
    {
        return $this->hasMany('SisInventario\Proveedor');
    }

    public function inventariables()
    {
        return $this->hasMany('SisInventario\Inventariable');
    } 

    public function scopeDescripcion($query, $descripcion)
    {
        if($descripcion)
            return $query->where('descripcion', 'LIKE', "%$descripcion%");   
    } 
}

