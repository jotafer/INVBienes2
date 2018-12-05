<?php

namespace SisInventario\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Grupo;

class GrupoController extends Controller{




    public function index()
    {
        $grupos = Grupo::withTrashed()->paginate(7);
    	return view('admin.grupos.index')->with(compact('grupos'));
    }

    public function store(Request $request)
    {

        $this->validate($request, Grupo::$rules, Grupo::$messages);

        Grupo::create($request->all());
    	return back()->with('notification', 'Grupo registrado exitosamente.');
    }

    public function edit($id)
    {
    
        $grupo = Grupo::findOrFail($id);
    	return view('admin.grupos.edit')->with(compact('grupo'));
    }



    public function update($id, Request $request)
    {
        
        $rules = [
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|numeric|digits:2'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para el subgrupo.',
            'codigo.required' => 'Es necesario ingresar un codigo para el subgrupo.'
        ];
        $this->validate($request, $rules, $messages);

        $grupo = Grupo::find($id);
        $grupo->nombre = $request->input('nombre');
        $codigo = $request->input('codigo');

        $grupo->save();
        return back()->with('notification', 'Grupo actualizado exitosamente.');
    }

    public function delete($id)
    {
        Grupo::find($id)->delete();

        return back()->with('notification','El grupo ha sido dado de baja correctamente.');
        
    }

    public function restore($codigo)
    {
        Grupo::withTrashed()->find($codigo)->restore();

        return back()->with('notification','El grupo se ha habilitado correctamente.');
        
    }

}



