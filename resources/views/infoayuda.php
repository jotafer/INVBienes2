@extends('layouts.admin')

@section('contenido')

            <div class="panel panel-primary">
                <div class="panel-heading">Sistema Gestion de inventario</div>

                <div class="panel-body">
                    <h3>1. Pantalla Inicial<h3>

                    La pantalla inicial es el punto de partida para el uso de la aplicación. 
					Se muestran los diferentes bienes muebles en inventario,
					asociado al movimiento realizado sobre ellos. Se diferencia tres estados: en alta, baja y traslado.

					La tabla Inventario actual muestra el código de los bienes muebles de acuerdo al grupo, subgrupo y especie al que pertenecen, 
					el código de la ubicación física de los bienes muebles representa la dependencia municipal donde se encuentran.
 

					Mediante opciones de selección se pueden buscar bienes por grupo, subgrupo, especie (codificación)
					y descripción del bien. 


                </div>
            </div>
        </div>


@endsection




