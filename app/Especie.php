<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Especie extends Model{

    protected $table = 'especie';

    use Notifiable;

    use Softdeletes;

    public static $rules = [
    	'codigo' => 'required',
        'nombre' => 'required|string|max:255',
        'grupo_id' => 'required|numeric',
        'subgrupo_id' => 'required',
        'codificacion' => 'required|unique:especie'
    ];

    public static $messages = [
    	'codigo.required' => 'Es necesario ingresar un codigo para la especie.',
    	'nombre.required' => 'Es necesario ingresar un nombre para la especie.',
    	'grupo_id.required' => 'Es necesario ingresar el grupo a que pertenece.',
    	'subgrupo_id.required' => 'Es necesario ingresar el subgrupo a que pertenece.',
        'codificacion.unique' => 'Esta especie ya se encuentra registrada.'

    ];

    protected $fillable = [
        'codigo', 'nombre', 'grupo_id', 'subgrupo_id','codificacion'
    ];

    public function especies()
    {
        return $this->belongsTo('sisInventario\Especie');
    }
}
