<?php

namespace SisInventario\Http\Controllers;

use Illuminate\Http\Request;
use SisInventario\Http\Controllers\Controller;
use SisInventario\Inventariable;
use SisInventario\Ubicacion;
use SisInventario\Sububicacion;
use Illuminate\Support\Facades\DB;
use PDF;

class PDFController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function getPDF(Request $request){
    	

        $ubicaciones = Ubicacion::all();
        $ubicacion_id = $request->get('ubicacion_id');
        //$sububicacion_id = $request->get('sububicacion_id');

        $inventariables = Inventariable::orderBy('id', 'DESC')
            ->ubicacion_id($ubicacion_id)
            ->paginate(12);

        $pdf = PDF::loadView('pdf.generarplaquetaprueba',[
        	'ubicaciones'=>$ubicaciones,
        	'inventariables'=>$inventariables
        ]);
        return $pdf->stream('generarplaquetaprueba.pdf');        
    }


}

