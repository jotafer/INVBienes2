<?php

namespace SisInventario;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{

	use Notifiable;

    use Softdeletes;

    
    public static $rules = [
        'nombre' => 'required|string|max:255',
        'altaesp_id' => 'required'
    ];

    public static $messages = [
    	'name.required' => 'Es necesario ingresar un nombre para el proveedor.',
        'altaesp_id.required' => 'Es necesario ingresar el grupo de especies.',
    ];

    protected $fillable = ['nombre', 'altaesp_id'];

    public function scopeNombre($query, $nombre)
    {
        if($nombre) 
            return $query->where('nombre', 'LIKE', "%$nombre%");   
    }

    public function altaesp()
    {
        return $this->belongsTo('sisInventario\Altaesp');
    }   

}
