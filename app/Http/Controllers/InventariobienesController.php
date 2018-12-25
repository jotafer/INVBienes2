<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;
use SisInventario\Grupo;
use SisInventario\Subgrupo;
use SisInventario\Especie;
use SisInventario\Ubicacion;
use SisInventario\Alta;
use SisInventario\Inventariable;

class InventariobienesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function byGrupo($id)
    {
        return Subgrupo::where('grupo_id', $id)->get();
    }

    public function bySubgrupo($id)
    {
        return Especie::where('subgrupo_id', $id)->get();
    }
    
    public function index(Request $request)
    {

        $descripcionbien = $request->get('descripcionbien');
        $grupo_id = $request->get('grupo_id');
        $subgrupo_id = $request->get('subgrupo_id');
        $especie_id = $request->get('especie_id');

        $grupos = Grupo::all();
        $subgrupos = Subgrupo::all();
        $especies = Especie::all();
        $ubicaciones = Ubicacion::all();

        $altas = Inventariable::where('movimiento_id', 1)
            ->grupo_id($grupo_id)
            ->subgrupo_id($subgrupo_id)
            ->especie_id($especie_id)
            ->descripcionbien($descripcionbien)
            ->latest()
            ->paginate(4);

        $bajas = Inventariable::where('movimiento_id', 2)
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

        return view('inventariobienes')->with(compact('altas', 'traslados','bajas','grupos','subgrupos','ubicaciones'));
    }

    public function plaqueta(Request $request)
    {
        $u = $request->input('u');
        $s = $request->input('s');
        $fecha = $request->input('fecha');

        $ubiselecc = $request->input('ubiselecc');
        $sububiselecc = $request->input('sububiselecc');
        $fecha = $request->input('fecha');

        $ubicaciones = Ubicacion::all();
        $ubicacion_id = $request->get('ubicacion_id');
        $sububicacion_id = $request->get('sububicacion_id');
        $fecha = $request->get('fecha');
        //$sububicacion_id = $request->get('sububicacion_id');

        $inventariables = Inventariable::latest()
            ->ubicacion_id($ubicacion_id)
            ->fecha($fecha)
            ->search($u)
            ->paginate(12);


        return view('generarplaqueta', compact('inventariables','ubicaciones','u','s','f'));
    }


   

    public function edit($id)
    {
    
        $alta = Alta::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        return view('altas.edit')->with(compact('alta'));
    }

    public function traslado($id)
    {
    
        $alta = Alta::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        return view('inventariables.traslado')->with(compact('alta'));
    }

    public function baja($id)
    {
    
        $alta = Alta::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        return view('inventariables.baja')->with(compact('alta'));
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


    public function scopeSearch($query, $descripcionbien)
    {
        return $query->where('descripcionbien', 'LIKE', "descripcionbien");   
    }    

}

