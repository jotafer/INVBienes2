<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;
use SisInventario\Grupo;
use SisInventario\Subgrupo;
use SisInventario\Especie;
use SisInventario\Inventariable;
use SisInventario\Ubicacion;

class VerbienesController extends Controller
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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($id)
    {
        $inventariable = Inventariable::findOrFail($id);
        return view('inventariables.show')->with(compact('inventariable'));
    }

    
    public function index()
    {

        $grupos = Grupo::all();
        $ubicaciones = Ubicacion::all();
        $subgrupos = Subgrupo::all();
        $inventariables = Inventariable::withTrashed()->get();
        return view('verbienes')->with(compact('inventariables', 'grupos','subgrupos','ubicaciones'));
    }

    public function store(Request $request)
    {

        $this->validate($request, Alta::$rules, Alta::$messages);

        Alta::create($request->all());
        //$grupo = new Grupo();    
        //$grupo->nombre = $request->input('nombre');
        //$grupo->codigo = $request->input('codigo');

        return back()->with('notification', 'Alta registrada exitosamente.');
    }

    public function traslado($id)
    {
    
        $inventariable = Inventariable::findOrFail($id);
        $ubicaciones = Ubicacion::all();
        return view('inventariables.traslado')->with(compact('inventariable','ubicaciones'));
    }

    public function edit($id)
    {
    
        $inventariable = Inventariable::findOrFail($id);
        $ubicaciones = Ubicacion::all();
        return view('inventariables.traslado')->with(compact('inventariable','ubicaciones'));
    }

    public function editb($id)
    {
    
        $inventariable = Inventariable::findOrFail($id);
        $ubicaciones = Ubicacion::all();
        return view('inventariables.darbaja')->with(compact('inventariable','ubicaciones'));
    }

    public function darbaja($id)
    {
    
        $inventariable = Inventariable::findOrFail($id);
        //$grupo = Grupo::where('id', $id)->first();
        $ubicaciones = Ubicacion::all();
        return view('inventariables.darbaja')->with(compact('inventariable','ubicaciones'));
    }



    public function update($id, Request $request)
    {
        $rules = [
            'fecha' => 'required|date',
            'proveedor' => 'required|string|max:255',
            'ordendecompra' => 'required|string|max:255',
            'factura' => 'required|numeric',

            //Codigo Asignado

            'descripcionbien' => 'nullable|string|max:255',
            'preciounitario' => 'required|numeric',
            'observaciones' => 'string|max:255',
            'ubicacion_id' => 'required',
            'sububicacion_id' => 'required'
        ];

        $messages = [
            'fecha.required' => 'Es necesario ingresar la fecha del traslado.',
            'estado_conservacion.required' => 'Es necesario ingresar el estado del producto.',
            'ubicacion_id.required' => 'Es necesario ingresar el destino del producto.',
            'sububicacion_id' => 'Es necesario ingresar la sub ubicacion producto.'
        ];
        $this->validate($request, $rules, $messages);

        $inventariable = Inventariable::find($id);
        $inventariable->movimiento_id = $request->input('movimiento_id');
        $inventariable->fecha = $request->input('fecha');
        $inventariable->estado_conservacion = $request->input('estado_conservacion');
        $inventariable->ubicacion_id = $request->input('ubicacion_id');
        $inventariable->sububicacion_id = $request->input('sububicacion_id');

        $inventariable->save();
        return back()->with('notification','Movimiento registrado exitosamente.');
    }

    public function updateb($id, Request $request)
    {
        $rules = [
            'fecha' => 'required|date',
            'proveedor' => 'required|string|max:255',
            'ordendecompra' => 'required|string|max:255',
            'factura' => 'required|numeric',

            //Codigo Asignado

            'descripcionbien' => 'nullable|string|max:255',
            'observaciones' => 'string|max:255',
            'ubicacion_id' => 'required',
            'sububicacion_id' => 'required'
        ];

        $messages = [
            'fecha.required' => 'Es necesario ingresar la fecha del traslado.',
            'estado_conservacion.required' => 'Es necesario ingresar el estado del producto.',
            'ubicacion_id.required' => 'Es necesario ingresar el destino del producto.',
            'sububicacion_id' => 'Es necesario ingresar la sub ubicacion producto.'
        ];
        $this->validate($request, $rules, $messages);

        $inventariable = Inventariable::find($id);
        $inventariable->movimiento_id = $request->input('movimiento_id');
        $inventariable->fecha = $request->input('fecha');
        $inventariable->estado_conservacion = $request->input('estado_conservacion');
        $inventariable->ubicacion_id = $request->input('ubicacion_id');
        $inventariable->sububicacion_id = $request->input('sububicacion_id');

        $inventariable->save();
        return back()->with('notification','Baja registrada exitosamente.');
    }

    public function delete($id)
    {
        Inventariable::find($id)->delete();

        return back()->with('notification','La alta ha sido eliminada.');
        
    }

    public function restore($id)
    {
        Inventariable::withTrashed()->find($id)->restore();

        return back()->with('notification','La alta se ha restaurado correctamente.');
        
    }

}

