<?php

namespace SisInventario\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Ubicacion;
use SisInventario\Sububicacion;

class UbicacionController extends Controller{




    public function index()
    {
        $ubicaciones = Ubicacion::withTrashed()->get();
    	return view('admin.ubicaciones.index')->with(compact('ubicaciones'));
    }

    public function store(Request $request)
    {

        $this->validate($request, Ubicacion::$rules, Ubicacion::$messages);

        Ubicacion::create($request->all());

    	return back()->with('notification', 'Dependencia Municipal registrada exitosamente.');
    }

    public function edit($id)
    {
        $ubicacion = Ubicacion::findOrFail($id);
        $sububicaciones = $ubicacion->sububicaciones;
    	return view('admin.ubicaciones.edit')->with(compact('ubicacion', 'sububicaciones'));
    }

    public function update($codigo, Request $request)
    {
        
        $this->validate($request, Ubicacion::$rules, Ubicacion::$messages);

        Ubicacion::find($codigo)->update($request->all());

        //return back()->with('notification', 'Grupo actualizado exitosamente.');
        return view('admin.ubicaciones.index')->with(compact('ubicacion'));
    }

    public function delete($id)
    {
        Ubicacion::find($id)->delete();

        return back()->with('notification','La Dependencia Municipal ha sido dado de baja correctamente.');
        
    }

    public function restore($id)
    {
        Ubicacion::withTrashed()->find($id)->restore();

        return back()->with('notification','La dependencia se ha habilitado correctamente.');
        
    }

}



