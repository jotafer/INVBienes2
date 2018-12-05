<?php

namespace SisInventario;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model{

    protected $table = 'ubicacion';

	use Notifiable;

    use Softdeletes;

    public static $rules = [
        'dependenciamunicipal' => 'required|string|max:255',
        'codigo' => 'required|numeric|digits:2',
    ];

    public static $messages = [
        'dependenciamunicipal' => 'Es necesario ingresar un nombre para la dependencia.',
        'codigo.required' => 'Es necesario ingresar un codigo para la dependencia.'

    ];

    protected $fillable = [
        'dependenciamunicipal', 'codigo'
    ];

    public function sububicaciones()
    {
        return $this->hasMany('SisInventario\Sububicacion');
    } 
}
