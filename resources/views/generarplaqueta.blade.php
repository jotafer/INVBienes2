@extends('layouts.admin2')

@section('contenido')

<link href="{{ URL::asset('css/estilostable.css') }}" rel="stylesheet" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div class="panel panel-primary">


        <div class="panel-heading">Productos en Inventario</div>
        <div class="panel-body">
            <img src="img/logomunic.png"/ align="right" width="120" height="120">


        <div id="content">

            {{ Form::open(['route' => 'generarplaqueta', 'method' => 'GET', 'class' => 'form-inline pull-left']) }} 
            
            {{Form::hidden('sububicacion_id', null, ['class' => 'form-control', 'id'=>'sububicacion_id', 'placeholder' => 'Sub-ubicacion']) }}


            <table class="tminmargenes" width="100%">

            <td>
                <select name="ubicacion_id" class="form-control" id="select-ubicacion" name="select-ubicacion">
                                    <option value="">Seleccione Ubicacion</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{$ubicacion->id}}">{{$ubicacion->dependenciamunicipal}}</option>
                                        @endforeach
                                        </select>


            </td>
            <td>
                <select name="sububicacion_id" class="form-control" id="select-sububicacion">
                                    <option value="">Seleccione Sububicacion</option>
                </select>

            </td>

            <td>

            <input type="text" id="datepicker" class="form-control" name="fecha" align="right" placeholder="Ingrese fecha">

            </td>

            <td> 
                <button type="submit" class="btn btn-default" onClick="pasarFunction">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </td>




                        {{ Form::close() }}

            </table>

    


                 


        </div>

        <div>
        <table class="tmargenes" width="55%">

  
        <td>Ubicacion:</td>
        <td><label><span id="span-ubic">{{ isset($u) ? $u : '' }}</span></label></td>

        <tr>
    
        <td>Sub ubicacion:</td>
        <td><label><span id="span-sububic"></span></label></td>

        <tr>

        <td>Fecha:</td>
        <td><label><span id="span-fecha"></span></label></td>

        </table>
      
        </div>

                <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th>Fecha</th>
                                <th>Descripción del bien</th>
                                <th>Costo de incorporación</th>
                                <th>Estado de conservación</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_alta"></tbody>
                            @foreach ($inventariables as $inventariable)
                            <tr>
                                <th>
                                 
                                {{ $inventariable->grupo_id }}.0{{ $inventariable->subgrupo_id }}.{{ $inventariable->especie_id }}
                     
                                </th>
                                <th>0{{ $inventariable->ubicacion_id }} . 0{{ $inventariable->sububicacion_id }}</th>
                                <th>{{ $inventariable->fecha }}</th>
                                <th>{{ $inventariable->descripcionbien }}</th>
                                <th>{{ $inventariable->costo_incorporacion }}</th>
                                <th>
                                    @if($inventariable->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($inventariable->estado_conservacion == 1)<p>R</p> @endif
                                    @if($inventariable->estado_conservacion == 2)<p>M</p> @endif
                                </th>
                                
                            </tr>
                            @endforeach
                    </table>

                        {{ $inventariables->appends(['u' => $u])->links() }}


                </div>
           
            </br>
            </br>
            <div class="form-control">
                <center><p>Dirección de Cementerio Municipal de Chillán</p></center>
            </div>    

          </div>

        <div class="form-control">
        <button onclick="myFunction()">Generar para imprimir</button>
        <input type="button" value="Imprimir" id="hideshow" onClick="window.print();"/>
        </div>    

    </div>



</div>


    
@endsection

@section('scripts')

<script src="/js/users/ubicaciones/index.js"></script>
<script src="/js/users/inventariables/jquery.js"></script>
<script src="/js/users/inventariables/jquery-ui.js"></script>


<script type="text/javascript">

        $(document).on('change', '#select-ubicacion', function(event) {
    
        $('#ubicacion_id').val($("#select-ubicacion option:selected").text());
        $('#sububicacion_id').val($("#select-sububicacion option:selected").text());
        $('#span-ubic').html($("#select-ubicacion option:selected").text());

});
</script>

<script type="text/javascript">
        $(document).on('change', '#select-sububicacion', function(event) {
    
        $('#ubicacion_id').val($("#select-ubicacion option:selected").text());
        $('#sububicacion_id').val($("#select-sububicacion option:selected").text());
        $('#span-sububic').html($("#select-sububicacion option:selected").text());

});
</script>

    <script type="text/javascript">

    $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy',  
            maxDate: new Date 
        });
    });

    </script>

    <script type="text/javascript">

    function myFunction() {
        var x = document.getElementById("content");
        
        if (x.style.display === "none") {
            x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        }
    </script>



@endsection