<?php

namespace SisInventario\Http\Controllers\Admin;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Grupo;
use SisInventario\Subgrupo;
use SisInventario\Especie;

class EspecieController extends Controller{


    public function bySubgrupo($id)
    {
        return Especie::where('subgrupo_id', $id)->get();
    }

    public function index()
    {
        $especies = Especie::withTrashed()->paginate(7);
        $grupos = Grupo::all();
        $subgrupos = Subgrupo::all();
        return view('admin.especies.index')->with(compact('especies','grupos','subgrupos'));        
    	//return view('admin.subgrupos.index')->with(compact('subgrupos'));
    }

    public function store(Request $request)
    {

        $this->validate($request, Especie::$rules, Especie::$messages);

        Especie::create($request->all());
        //$grupo = new Grupo();    
        //$grupo->nombre = $request->input('nombre');
        //$grupo->codigo = $request->input('codigo');

    	return back()->with('notification', 'Especie registrada exitosamente.');
    }

    public function edit($id)
    {
    
        $especie = Especie::findOrFail($id);

    	return view('admin.especies.edit')->with(compact('especie'));
    }



    public function update($id, Request $request)
    {
        
       $rules = [
            'nombre' => 'required|string|max:255',
            'codigo' => 'required|numeric|digits:3'
        ];

        $messages = [
            'name.required' => 'Es necesario ingresar un nombre para la especie.',
            'codigo.required' => 'Es necesario ingresar un codigo para el especie.'
        ];
        $this->validate($request, $rules, $messages);

        $especie = Especie::find($id);
        $especie->nombre = $request->input('nombre');
        $codigo = $request->input('codigo');

        $especie->save();
        return back()->with('notification', 'Especie actualizada exitosamente.');
    }

    public function delete($id)
    {
        Especie::find($id)->delete();

        return back()->with('notification','La especie ha sido dada de baja correctamente.');
        
    }

    public function restore($codigo)
    {
        Especie::withTrashed()->find($codigo)->restore();

        return back()->with('notification','La especie se ha habilitado correctamente.');
        
    }

}



