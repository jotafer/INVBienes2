<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Inventariable;

class InventariableController extends Controller
{

    public function index(Request $request)
    {
        $Inventariables = Inventariable::all();
        return view('home')->with(compact('Inventariables'));
    }



    public function plaqueta()
    {
        return view('pdf.generarplaquetaprueba');
    }
      


    public function store(Request $request)
    {
         $this->validate($request, [
            'fecha' => 'required|date',
            'proveedor' => 'required|string|max:255',
            'ordendecompra' => 'required|string|max:255',
            'factura' => 'required|numeric',

            //Codigo Asignado
            'grupo_id' => 'required',
            'subgrupo_id' => 'required',
            'especie_id' => 'required',

            'descripcionbien' => 'nullable|string|max:255',
            'costo_incorporacion' => 'required|numeric',
            'ubicacion_id' => 'required',
            'sububicacion_id' => 'required',
            'estado_conservacion' => 'required'
        ], [
            'fecha.required' => 'Es necesario ingresar la fecha de adquisicion.',
            'proveedor.required' => 'Es necesario ingresar el proveedor del bien.',
            'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
            'factura.required' => 'Es necesario ingresar la factura del bien.',
            'estado_conservacion.required' => 'Es necesario ingresar el estado de conservacion del bien.',

            //Codigo asignado
            'grupo_id.required' => 'Es necesario ingresar el grupo del bien.',
            'subgrupo_id.required' => 'Es necesario ingresar el subgrupo del bien.',
            'especie_id.required' => 'Es necesario ingresar la especie del bien.',

            'cantidad.required' => 'Es necesario ingresar la cantidad del bien.',
            'descripcionbien.required' => 'Es necesario ingresar la descripcion del bien.',
            'costo_incorporacion.required' => 'Es necesario ingresar el precio del bien.',
            'estado_conservacion.required' => 'Es necesario ingresar estado del bien.',
            'ubicacion_id.required' => 'Es necesario ingresar la ubicacion a la que pertenece.'
        ]);

        Inventariable::create($request->all());
        return back()->with('notification', 'Inventariable registrado exitosamente.');
    }

    public function edit($id)
    {
        $inventariable = Inventariable::findOrFail($id);
        return view('inventariables.edit')->with(compact('inventariable'));
    }

    public function edita($id)
    {
        $alta = Inventariable::findOrFail($id);
        return view('altas.edita')->with(compact('alta'));
    }

    public function editt($id)
    {
        $traslado = Inventariable::findOrFail($id);
        return view('traslados.edit')->with(compact('traslado'));
    }

    public function editb($id)
    {
        $baja = Inventariable::findOrFail($id);
        return view('bajas.edit')->with(compact('baja'));
    }



    public function update(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required'
        ], [
            'nombre.required' => 'Es necesario ingresar nombre del proveedor.'
        ]);

        $proveedor_id = $request->input('proveedor_id');

        $proveedor = Proveedor::find($proveedor_id);
        $proveedor->nombre = $request->input('nombre');
        $proveedor->save();

        return back();
    }

    public function updatea($id, Request $request)
    {
        $rules = [
            'descripcionbien' => 'required',

            'ordendecompra' => 'required',
            'factura' => 'required',
            'fecha' => 'required',
            'costo_incorporacion' => 'required',

            'estado_conservacion' => 'required'
        ];

        $messages = [
            'descripcionbien.required' => 'Es necesario ingresar la descripcion del bien.',

            'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
            'factura.required' => 'Es necesario ingresar la factura del bien.',
            'fecha.required' => 'Es necesario ingresar la fecha de ultimo movimiento.',
            'costo_incorporacion.required' => 'Es necesario ingresar el costo del bien.',

            'estado_conservacion.required' => 'Es necesario ingresar estado del bien.',
        ];
        $this->validate($request, $rules, $messages);

        $alta = Inventariable::find($id);
        $alta->descripcionbien = $request->input('descripcionbien');
        $alta->ordendecompra = $request->input('ordendecompra');
        $alta->factura = $request->input('factura');
        $alta->fecha = $request->input('fecha');
        $alta->costo_incorporacion = $request->input('costo_incorporacion');
        $alta->estado_conservacion = $request->input('estado_conservacion');


        $alta->save();
        return back()->with('notification','Inventariable actualizado exitosamente.');
    }

    public function updatet($id, Request $request)
    {
        $rules = [
            'descripcionbien' => 'required',

            'ordendecompra' => 'required',
            'factura' => 'required',
            'fecha' => 'required',
            'costo_incorporacion' => 'required',

            'estado_conservacion' => 'required'
        ];

        $messages = [
            'descripcionbien.required' => 'Es necesario ingresar la descripcion del bien.',

            'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
            'factura.required' => 'Es necesario ingresar la factura del bien.',
            'fecha.required' => 'Es necesario ingresar la fecha de ultimo movimiento.',
            'costo_incorporacion.required' => 'Es necesario ingresar el costo del bien.',

            'estado_conservacion.required' => 'Es necesario ingresar estado del bien.',
        ];
        $this->validate($request, $rules, $messages);

        $alta = Inventariable::find($id);
        $alta->descripcionbien = $request->input('descripcionbien');
        $alta->ordendecompra = $request->input('ordendecompra');
        $alta->factura = $request->input('factura');
        $alta->fecha = $request->input('fecha');
        $alta->costo_incorporacion = $request->input('costo_incorporacion');
        $alta->estado_conservacion = $request->input('estado_conservacion');


        $alta->save();
        return back()->with('notification','Inventariable actualizado exitosamente.');
    }

    public function updateb($id, Request $request)
    {
        $rules = [
            'descripcionbien' => 'required',

            'ordendecompra' => 'required',
            'factura' => 'required',
            'fecha' => 'required',
            'costo_incorporacion' => 'required',

            'estado_conservacion' => 'required'
        ];

        $messages = [
            'descripcionbien.required' => 'Es necesario ingresar la descripcion del bien.',

            'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
            'factura.required' => 'Es necesario ingresar la factura del bien.',
            'fecha.required' => 'Es necesario ingresar la fecha de ultimo movimiento.',
            'costo_incorporacion.required' => 'Es necesario ingresar el costo del bien.',

            'estado_conservacion.required' => 'Es necesario ingresar estado del bien.',
        ];
        $this->validate($request, $rules, $messages);

        $baja = Inventariable::find($id);
        $baja->descripcionbien = $request->input('descripcionbien');
        $baja->ordendecompra = $request->input('ordendecompra');
        $baja->factura = $request->input('factura');
        $baja->fecha = $request->input('fecha');
        $baja->costo_incorporacion = $request->input('costo_incorporacion');
        $baja->estado_conservacion = $request->input('estado_conservacion');


        $baja->save();
        return back()->with('notification','Inventariable actualizado exitosamente.');
    }

    public function deletea($id)
    {
        $alta = Inventariable::find($id)->delete();
        return back()->with('notification','Inventariable eliminado exitosamente.');
    }

    public function deleteb($id)
    {
        $baja = Inventariable::find($id)->delete();
        return back()->with('notification','Inventariable eliminado exitosamente.');
    }

    public function deletet($id)
    {
        $traslado = Inventariable::find($id)->delete();
        return back()->with('notification','Inventariable eliminado exitosamente.');
    }

   

}



