<?php

namespace sisInventario\Http\Controllers\Admin;

use Illuminate\Http\Request;
use sisInventario\Http\Controllers\Controller;
use sisInventario\Grupo;

class GrupoController extends Controller{




    public function index()
    {
        $grupos = Grupo::all();
    	return view('admin.grupos.index')->with(compact('grupos'));
    }

    public function store(Request $request)
    {

        $rules = [
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|numeric|digits:2',
        ];
        $messages = [
            'nombre.required' => 'Es necesario ingresar el nombre del grupo.', 
            'nombre.max' => 'El nombre es demasiado extenso',

            'codigo.required' => 'Es indispensable ingresar el codigo del grupo.',


        ];

        $this->validate($request, $rules, $messages);

        $grupo = new Grupo();    
        $grupo->nombre = $request->input('nombre');
        $grupo->codigo = $request->input('codigo');
        $grupo->save();

    	return back()->with('notification', 'Grupo registrado exitosamente.');
    }

    public function edit($codigo)
    {
    
        $grupo = Grupo::where('codigo', $codigo)->first();
    	return view('admin.grupos.edit')->with(compact('grupo'));
    }



    public function update($codigo, Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|numeric|digits:2',
        ];
         $messages = [
            'nombre.required' => 'Es necesario ingresar el nombre del grupo.', 
            'nombre.max' => 'El nombre es demasiado extenso',

            'codigo.required' => 'Es indispensable ingresar el codigo del grupo.',
        ];
        $this->validate($request, $rules, $messages);

        $grupo = Grupo::find($codigo);
        $grupo->nombre = $request->input('nombre');

        $grupo->codigo = $request->input('codigo');
        
        $grupo->save();
        return back()->with('notification', 'Grupo modificado exitosamente.');
    }

    public function delete($id)
    {
        $grupo = Grupo::find($id);
        $grupo->delete();

        return back()->with('notification','El grupo ha sido dado de baja correctamente.');
        
    }

}



