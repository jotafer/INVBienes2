<?php

namespace SisInventario\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Grupo;
use SisInventario\Subgrupo;

class SubgrupoController extends Controller{

    public function byGrupo($id)
    {
        return Subgrupo::where('grupo_id', $id)->get();
    }


    public function index()
    {
        $subgrupos = Subgrupo::withTrashed()->paginate(7);
        $grupos = Grupo::all();

        return view('admin.subgrupos.index')->with(compact('grupos', 'subgrupos'));        
    	//return view('admin.subgrupos.index')->with(compact('subgrupos'));
    }

    public function store(Request $request)
    {

        $this->validate($request, Subgrupo::$rules, Subgrupo::$messages);

        Subgrupo::create($request->all());
    	return back()->with('notification', 'Subgrupo registrado exitosamente.');
    }

    public function edit($id)
    {
    
        $subgrupo = Subgrupo::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
    	return view('admin.subgrupos.edit')->with(compact('subgrupo'));
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

        $subgrupo = Subgrupo::find($id);
        $subgrupo->nombre = $request->input('nombre');
        $codigo = $request->input('codigo');

        $subgrupo->save();
        return back()->with('notification', 'Subgrupo actualizado exitosamente.');

    }

    public function delete($id)
    {
        Subgrupo::find($id)->delete();

        return back()->with('notification','El Subgrupo ha sido dado de baja correctamente.');
        
    }

    public function restore($id)
    {
        Subgrupo::withTrashed()->find($id)->restore();

        return back()->with('notification','El Subgrupo se ha habilitado correctamente.');
        
    }

}



