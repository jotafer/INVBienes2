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
    
    public function index()
    {
        $grupos = Grupo::all();
        $subgrupos = Subgrupo::all();
        $especies = Especie::all();
        $ubicaciones = Ubicacion::all();
        $altas = Inventariable::where('movimiento_id', 1)->paginate(4);
        $bajas = Inventariable::where('movimiento_id', 2)->paginate(4);
        $traslados = Inventariable::where('movimiento_id', 3)->paginate(4);
        return view('inventariobienes')->with(compact('altas', 'traslados','bajas'));

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

