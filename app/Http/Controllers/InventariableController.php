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
            'costo_incorporacion' => 'required',
            'ubicacion_id' => 'required'
        ], [
            'fecha.required' => 'Es necesario ingresar la fecha de adquisicion.',
            'proveedor.required' => 'Es necesario ingresar el proveedor del bien.',
            'ordendecompra.required' => 'Es necesario ingresar el orden de compra del bien.',
            'factura.required' => 'Es necesario ingresar la factura del bien.',

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
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit')->with(compact('proveedor'));
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

    public function delete($id)
    {
        Proveedor::find($id)->delete();
        return back();
    }

   

}



