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
    ];

    public static $messages = [
        'dependenciamunicipal' => 'Es necesario ingresar un nombre para la dependencia.',
        'codigo.required' => 'Es necesario ingresar un codigo para la dependencia.'

    ];

    protected $fillable = [
        'subdependenciamunicipal', 'codigo', 'ubicacion_id'
    ];


    public function ubicacion()
    {
        return $this->belongsTo('SisInventario\Ubicacion');
    }
}
