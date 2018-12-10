<?php

namespace SisInventario;


use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Sububicacion extends Model{

    protected $table = 'sububicacion';

	use Notifiable;

    use Softdeletes;

    public static $rules = [
        'subdependenciamunicipal' => 'required|string|max:255',
        'codigo' => 'required|numeric|digits:2',
        'codificacion' => 'required|unique:sububicacion'

    ];

    public static $messages = [
        'dependenciamunicipal' => 'Es necesario ingresar un nombre para la dependencia.',
        'codigo.required' => 'Es necesario ingresar un codigo para la dependencia.',
        'codificacion.required' => 'Es necesario completar los campos.',
        'codificacion.unique' => 'Esta sub ubicacion ya se encuentra registrada.'


    ];

    protected $fillable = [
        'subdependenciamunicipal', 'codigo', 'ubicacion_id', 'codificacion'
    ];


    public function ubicacion()
    {
        return $this->belongsTo('SisInventario\Ubicacion');
    }
}
