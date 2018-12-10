<?php

namespace SisInventario\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Sububicacion;
use SisInventario\Ubicacion;

class SububicacionController extends Controller{


    public function byUbicacion($id)
    {
        return Sububicacion::where('ubicacion_id', $id)->get();
    }


    public function index()
    {
       
    }

    public function store(Request $request)
    {

        $this->validate($request, Sububicacion::$rules, Sububicacion::$messages);

        Sububicacion::create($request->all());

    	return back()->with('notification', 'Sub dependencia Municipal registrada exitosamente.');
    }

    public function edit($codigo)
    {
       
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'subdependenciamunicipal' => 'required'
        ], [
            'subdependenciamunicipal.required' => 'Es necesario ingresar nombre de la sub-ubicacion.'
        ]);

        $sububicacion_id = $request->input('sububicacion_id');

        $sububicacion = Sububicacion::find($sububicacion_id);
        $sububicacion->subdependenciamunicipal = $request->input('subdependenciamunicipal');
        $sububicacion->save();

        return back();
    }
        

    public function delete($id)
    {
        Sububicacion::find($id)->delete();

        return back()->with('notification','La Sub dependencia Municipal se ha dado de baja correctamente.');
        
    }

    public function restore($id)
    {
        Ubicacion::withTrashed()->find($id)->restore();

        return back()->with('notification','La Sub dependencia se ha habilitado correctamente.');
        
    }

}



