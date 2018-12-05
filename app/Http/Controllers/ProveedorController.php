<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Proveedor;

class ProveedorController extends Controller
{

    public function index(Request $request)
    {
        //$proveedores = Proveedor::all();

        $nombre = $request->get('nombre');

        $proveedores = Proveedor::orderBy('id', 'DESC')
            ->nombre($nombre)
            ->paginate(4);

        return view('proveedores.index')->with(compact('proveedores'));
    }
      


    public function store(Request $request)
    {
         $this->validate($request, [
            'nombre' => 'required'
        ], [
            'nombre.required' => 'Es necesario ingresar nombre del proveedor.'
        ]);

        Proveedor::create($request->all());
        return back()->with('notification', 'Proveedor registrado exitosamente.');
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



