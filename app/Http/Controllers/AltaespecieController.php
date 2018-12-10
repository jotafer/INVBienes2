<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;
use SisInventario\Grupo;
use SisInventario\Subgrupo;
use SisInventario\Especie;
use SisInventario\Ubicacion;
use SisInventario\Altaesp;
use SisInventario\Proveedor;
use SisInventario\Inventariable;

class AltaespecieController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function byGrupo($id)
    {
        return Subgrupo::where('grupo_id', $id)->get();
    }

    public function bySubgrupo($id)
    {
        return Especie::where('subgrupo_id', $id)->get();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $grupos = Grupo::all();
        $subgrupos = Subgrupo::all();
        $especies = Especie::all();
        $altasesp = Altaesp::withTrashed()->get();
        return view('/altas/altaespecie')->with(compact('grupos','subgrupos','especies'));
    }

    public function store(Request $request)
    {

        $this->validate($request, Altaesp::$rules, Altaesp::$messages);

        Altaesp::create($request->all());

        return back()->with('notification', 'Alta especie registrada exitosamente.');
    }

    public function edit($id)
    {
    
        $altaesp = Altaesp::findOrFail($id);
        $ubicaciones = Ubicacion::all();
        $proveedores = $altaesp->proveedores;
        $inventariables =$altaesp->inventariables;
        return view('altas.edit')->with(compact('altaesp', 'proveedores', 'inventariables','ubicaciones'));
    }

    public function editp($id)
    {
    
        $altaesp = Altaesp::findOrFail($id);
        $proveedores = $altaesp->proveedores;
        $inventariables =$altaesp->inventariables;
        return view('altas.editp')->with(compact('altaesp', 'proveedores', 'inventariables','ubicaciones'));
    }

    public function nuevaalta($id)
    {
    
        $altaesp = Altaesp::findOrFail($id);
        $ubicaciones = Ubicacion::all();
        $proveedores = $altaesp->proveedores;
        $inventariables =$altaesp->inventariables;
        return view('altas.nuevaalta')->with(compact('altaesp', 'proveedores', 'inventariables','ubicaciones'));
    }

    public function baja($id)
    {
    
        $alta = Alta::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        return view('altas.baja')->with(compact('alta'));
    }


    public function update($id, Request $request)
    {
        
        $rules = [
            'descripcion' => 'required|string|max:255',
        ];

        $messages = [
            'descripcion.required' => 'Es necesario ingresar una descripcion para la especie.',
        ];

        $this->validate($request, $rules, $messages);

        $altaesp = Altaesp::find($id);
        $altaesp->descripcion = $request->input('descripcion');
        
        $altaesp->save();
        return back()->with('notification', 'Descripcion actualizada exitosamente.');
    }

    public function delete($id)
    {
        Altaesp::find($id)->delete();

        return back()->with('notification','La alta ha sido eliminada.');
        
    }

    public function restore($id)
    {
        Altaesp::withTrashed()->find($id)->restore();

        return back()->with('notification','La alta se ha restaurado correctamente.');
        
    }

}

