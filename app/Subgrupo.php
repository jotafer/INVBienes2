<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Subgrupo extends Model{

    protected $table = 'subgrupo';

	use Notifiable;

    use Softdeletes;
    
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'codigo' => 'required',
        'grupo_id' => 'required|numeric',
        'codificacion' => 'required|unique:subgrupo'
    ];

    public static $messages = [
    	'name.required' => 'Es necesario ingresar un nombre para el subgrupo.',
    	'codigo.required' => 'Es necesario ingresar un codigo para el subgrupo.',
        'grupo_id.required' => 'Es necesario ingresar el grupo a que pertenece.',
        'codificacion.unique' => 'Este subgrupo ya se encuentra registrado.'
    ];

    protected $fillable = [
        'nombre', 'codigo', 'grupo_id','codificacion'
    ];

    public function subgrupos()
    {
        return $this->belongsTo('sisInventario\Grupo');
    }
}
