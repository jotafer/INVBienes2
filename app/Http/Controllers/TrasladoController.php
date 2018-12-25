<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;
use SisInventario\Grupo;
use SisInventario\Subgrupo;
use SisInventario\Especie;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Inventariable;

class TrasladoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function index(Request $request)
    {
        $descripcionbien = $request->get('descripcionbien');
        $grupo_id = $request->get('grupo_id');
        $subgrupo_id = $request->get('subgrupo_id');
        $especie_id = $request->get('especie_id');

        $grupos = Grupo::all();
        $subgrupos = Subgrupo::all();
        $especies = Especie::all();

        $altas = Inventariable::where('movimiento_id', 1)
            ->grupo_id($grupo_id)
            ->subgrupo_id($subgrupo_id)
            ->especie_id($especie_id)
            ->descripcionbien($descripcionbien)
            ->latest()
            ->paginate(4);

        $traslados = Inventariable::where('movimiento_id', 3)
            ->grupo_id($grupo_id)
            ->subgrupo_id($subgrupo_id)
            ->especie_id($especie_id)
            ->descripcionbien($descripcionbien)
            ->latest()
            ->paginate(4); 

        return view('traslados/trasladobien')->with(compact('altas', 'traslados','grupos','subgrupos'));
    }

    public function store(Request $request)
    {

        $this->validate($request, Alta::$rules, Alta::$messages);

        Alta::create($request->all());

        return back()->with('notification', 'Alta registrada exitosamente.');
    }

    public function edit($id)
    {
    
        $alta = Alta::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        return view('altas.edit')->with(compact('alta'));
    }

    public function traslado($id)
    {
    
        $Inventariable = Inventariable::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        return view('altas.traslado')->with(compact('Inventariable'));
    }

    public function baja($id)
    {
    
        $alta = Alta::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        return view('altas.baja')->with(compact('alta'));
    }


    public function update($id, Request $request)
    {
        
        $this->validate($request, Alta::$rules, Alta::$messages);

        Alta::find($id)->update($request->all());

        return back()->with('notification', 'Alta actualizada exitosamente.');
    }

    public function delete($id)
    {
        Alta::find($id)->delete();

        return back()->with('notification','La alta ha sido eliminada.');
        
    }

    public function restore($id)
    {
        Alta::withTrashed()->find($id)->restore();

        return back()->with('notification','La alta se ha restaurado correctamente.');
        
    }

}

