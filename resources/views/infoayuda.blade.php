@extends('layouts.admin')

@section('contenido')

<style>
div.panel-body{
  width:990px;
  margin: auto;
}
</style>

        <link href="{{ URL::asset('css/divmargen.css') }}" rel="stylesheet" type="text/css"/>

        <div class="panel panel-primary">
                <div class="panel-heading">Sistema Gestion de inventario</div>

                <div class="panel-body">

                    <h3>1. Pantalla Inicial</h3>

                    <img src="img/pantallainicial.jpg"/ width="900" height="518">
                    <br><br>
                    <p>La pantalla inicial es el punto de partida para el uso de la aplicación. 
					Se muestran los diferentes bienes muebles en inventario,
					asociado al movimiento realizado sobre ellos. Se diferencia tres estados: en alta, baja y traslado.
					<br><br>
					La tabla Inventario actual muestra el código de los bienes muebles de acuerdo al grupo, subgrupo y especie al que pertenecen, 
					el código de la ubicación física de los bienes muebles representa la dependencia municipal donde se encuentran.
 					<br><br>
					Mediante opciones de selección se pueden buscar bienes por grupo, subgrupo, especie (codificación)
					y descripción del bien. </p>

                    <h3>2. Alta de especie</h3>

                    <p>Seleccionando la sección de nueva alta de especie en el menú de inventario de la aplicación, se mostrarán las siguientes opciones:</p>

                    <img src="img/altaespecie.jpg"/>
                    <br><br>
                    <p>Es el formulario para registrar una especie. En caso de ingresar una especie que ya se encuentra registrada
                    el sistema indica al usuario con un mensaje de error que no se puede proceder con el registro.
                    Similar mensaje de error aparece si no se llena de forma correcta un campo
                    requerido, como por ejemplo la descripción de la especie como se puede observar en
                    la siguiente imagen:</p>

                    <img src="img/errorespecie.jpg"/>

                    <h3>3. Alta de bien mueble</h3>

                    <p> El alta de bien mueble se realiza con el siguiente formulario:</p>
                    <img src="img/formularioalta.jpg"/>
                    <br><br>
                    <p>Para evitar el ingreso de datos erróneos a la aplicación que posteriormente
                    puede afectar las estadísticas que se genera de forma automática en la
                    aplicación, el formulario de alta de bienes cuenta al igual que el
                    formulario para registrar las especies con un una validación automatizada de
                    todos los campos.</p>

                    <h3>4. Traslados y bajas</h3>


                    <img src="img/tablatraslados.jpg"/ width="800" height="422">
                    <br><br>

                    <p>La tabla para trasladar y dar de baja bienes muebles lista de forma cronológica los inventariables registrados. <br>
                    En caso de requerir, se pueden trasladar y dar de baja bienes muebles, completando el formulario como se muestra en la siguiente imagen:</p>

                    <img src="img/formulariotraslado.jpg"/ width="800" height="418">

                    <h3>5. Generar plaqueta de inventario</h3>

                    <p>La utilidad principal de la aplicación es la generación de plaqueta de inventario
                    con las dependencias y sub dependencias municipales seleccionadas.</p>

                    <img src="img/generarplaqueta.jpg"/ width="900" height="359">
                    <br><br>
                    Seleccionar ubicación, sub ubicación y fecha para la consulta, luego 
                    con la activación del botón “buscar” se genera el reporte.<br>
                    Volver a seleccionar ubicación y sububicacion, luego click en "Generar para imprimir"</p> 


                </div>
            </div>
        </div>


@endsection




