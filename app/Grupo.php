<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Grupo extends Model{

    protected $table = 'grupo';

	use Notifiable;

    use Softdeletes;
    
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'codigo' => 'required|numeric|digits:2|unique:grupo'
        //'codificacion' => 'required|unique:grupo|min:4'
    ];

    public static $messages = [
    	'name.required' => 'Es necesario ingresar un nombre para el grupo.',
    	'codigo.required' => 'Es necesario ingresar un codigo para el grupo.',
        'codigo.unique' => 'Este grupo ya se encuentra registrado.'

    ];

    protected $fillable = [
        'nombre', 'codigo'
    ];

    public function subgrupos()
    {
        return $this->hasMany('sisInventario\Subgrupo');
    }

    public function especies()
    {
        return $this->hasMany('sisInventario\Especie');
    }
}
