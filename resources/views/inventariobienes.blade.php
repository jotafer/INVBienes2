@extends('layouts.admin')

@section('contenido')

<link href="{{ URL::asset('css/estilostable2.css') }}" rel="stylesheet" type="text/css"/>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


<div class="panel panel-primary">

        <div class="panel-heading">Inventario</div>


<table cellspacing="10" cellpadding="10" width="100%" class="tmargenes">
        {{ Form::open(['route' => 'inventariobienes', 'method' => 'GET', 'class' => 'form-inline pull-right']) }}
        {{Form::hidden('grupo_id', null, ['class' => 'form-control', 'id'=>'grupo_id', 'placeholder' => 'Grupo']) }}
        {{Form::hidden('subgrupo_id', null, ['class' => 'form-control', 'id'=>'subgrupo_id', 'placeholder' => 'Subgrupo']) }}
        {{Form::hidden('especie_id', null, ['class' => 'form-control', 'id'=>'especie_id', 'placeholder' => 'Especie']) }} 

        <td style="padding:0 0px 0 15px;">
            
                        <select name="grupo_id" class="form-control" id="select-grupo" name="select-grupo">
                                            <option value="">Seleccione Grupo</option>
                                                @foreach ($grupos as $grupo)
                                                        <option value="{{$grupo->codigo}}">{{$grupo->codigo}} - {{$grupo->nombre}}</option>
                                                @endforeach
                                            </select>
        </td>
                        
            <td style="padding:0 0px 0 15px;">

                                   <select name="subgrupo_id" class="form-control" id="select-subgrupo">
                                                <option value="">Seleccione Subgrupo</option>
                                            </select>


            </td>
            <td style="padding:0 0px 0 15px;">
                                           <select name="especie_id" class="form-control" id="select-especie">
                                                <option value="">Seleccione Especie</option>
                                            </select>

            </td>

            <td style="padding:0 0px 0 15px;">

                                           {{Form::text('descripcionbien', null, ['class' => 'form-control', 'placeholder' => 'Descripción bien']) }}

            </td>

            <td style="padding:0 15px 0 15px;"> 

                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>


            </td>

        
                              
                        {{ Form::close() }} 
            </table>


        <div class="panel-body">
                    
            <div>

                        
            </div>



               <div class="panel panel-success">
                <div class="panel-heading">

                        <h3 class="panel-title">Productos en Alta</h3>  
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th><p style="color:white;">movimiento</p>Fecha</th>
                                <th>Descripción del bien</th>
                                <th>Costo incorporación</th>
                                <th>Estado conservación</th>
                                <th>Usuario</th>
                                <th>Movimiento</th>
                                @if (auth()->user()->role == 0)    
                                <th>Opciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_alta"></tbody>
                            @foreach ($altas as $alta)
                            <tr>
                                <th>
                                    <a href="/ver/{{ $alta->id }}">

            @if($alta->subgrupo_id == 3) <p>{{ $alta->grupo_id }} . 01 . {{ $alta->especie_id }}</p> 

            @elseif($alta->subgrupo_id == 4) <p>{{ $alta->grupo_id }} . 02 . {{ $alta->especie_id }}</p> 

            @elseif($alta->subgrupo_id == 5) <p>{{ $alta->grupo_id }} . 03 . {{ $alta->especie_id }}</p> 

            @elseif($alta->subgrupo_id == 6) <p>{{ $alta->grupo_id }} . 01 . {{ $alta->especie_id }}</p>

            @elseif($alta->subgrupo_id == 7) <p>{{ $alta->grupo_id }} . 02 . {{ $alta->especie_id }}</p>  

            @else {{ $alta->grupo_id }} . 0{{ $alta->subgrupo_id }} . {{ $alta->especie_id }} @endif




                                    </a>
                                </th>
                                <th>0{{ $alta->ubicacion_id }} . 0{{ $alta->sububicacion_id }}</th>
                                <th>{{ $alta->fecha }}</th>
                                <th>{{ $alta->descripcionbien }}</th>
                                <th>{{ $alta->costo_incorporacion }}</th>
                                <th>
                                    @if($alta->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($alta->estado_conservacion == 1)<p>R</p> @endif
                                    @if($alta->estado_conservacion == 2)<p>M</p> @endif
                                </th>
                                <th>{{ $alta->usuario }}</th>
                                <th> 
                                    <a href="/inventariables/{{$alta->id}}/traslado" class="btn btn-success btn-xs" style='width:90px; height:30px; font-size:14px'><i class="fa fa-truck"></i> Trasladar</a>
                                    </br>
                                    <a href="/inventariables/{{$alta->id}}/darbaja" class="btn btn-primary btn-xs" style='width:90px; height:30px; font-size:14px'><i class="fa fa-arrow-down"></i>  Dar baja</a>
                                </th>

                            @if (auth()->user()->role == 0)    
                                <td>
                            <a href="/altas/{{ $alta->id }}/edit" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>

                            <a href="/altas/{{ $alta->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>

                                </td>
                            @endif
                            </tr>
                            @endforeach
                    </table>

                    <div class="text-center">
                        {!! $altas->links(); !!}
                    </div>

                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                        <h3 class="panel-title">Productos en Traslado</h3>  
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th><p style="color:white;">movimiento</p>Fecha</th>
                                <th>Descripción del bien</th>
                                <th>Costo incorporación</th>
                                <th>Estado conservación</th>
                                <th>Usuario</th>
                                <th>Movimiento</th>
                                @if (auth()->user()->role == 0)    
                                <th>Opciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_traslado"></tbody>
                         @foreach ($traslados as $traslado)
                            <tr>
                                <th>
                                    <a href="/ver/{{ $traslado->id }}">

            @if($traslado->subgrupo_id == 3) <p>{{ $traslado->grupo_id }} . 01 . {{ $traslado->especie_id }}</p> 

            @elseif($traslado->subgrupo_id == 4) <p>{{ $traslado->grupo_id }} . 02 . {{ $traslado->especie_id }}</p> 

            @elseif($traslado->subgrupo_id == 5) <p>{{ $traslado->grupo_id }} . 03 . {{ $traslado->especie_id }}</p> 

            @elseif($traslado->subgrupo_id == 6) <p>{{ $traslado->grupo_id }} . 01 . {{ $traslado->especie_id }}</p>

            @elseif($traslado->subgrupo_id == 7) <p>{{ $traslado->grupo_id }} . 02 . {{ $traslado->especie_id }}</p>  

            @else {{ $traslado->grupo_id }} . 0{{ $traslado->subgrupo_id }} . {{ $traslado->especie_id }} @endif
                                    </a>

                                </th>
                                <th>0{{ $traslado->ubicacion_id }} . 0{{ $traslado->sububicacion_id }}</th>
                                <th>{{ $traslado->fecha }}</th>
                                <th>{{ $traslado->descripcionbien }}</th>
                                <th>{{ $traslado->costo_incorporacion }}</th>
                                <th>
                                    @if($traslado->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($traslado->estado_conservacion == 1)<p>R</p> @endif
                                    @if($traslado->estado_conservacion == 2)<p>M</p> @endif
                                </th>
                                <th>{{ $traslado->usuario }}</th>
                                <th> 
                                     <a href="/inventariables/{{$traslado->id}}/traslado" class="btn btn-success btn-xs" style='width:90px; height:30px; font-size:14px'><i class="fa fa-truck"></i> Trasladar</a>
                                    </br>
                                    <a href="/inventariables/{{$traslado->id}}/darbaja" class="btn btn-primary btn-xs" style='width:90px; height:30px; font-size:14px'><i class="fa fa-arrow-down"></i>  Dar baja</a>
                                </th>

                            @if (auth()->user()->role == 0)    
                            <td>
                            <a href="/traslados/{{ $traslado->id }}/edit" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>

                            <a href="/traslados/{{ $traslado->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>

                            </td>
                            @endif


                            </tr>
                            @endforeach
                        </table>

                        <div class="text-center">
                            {!! $traslados->links(); !!}
                        </div>
                </div>
            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                        <h3 class="panel-title">Productos en Baja</h3>  
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th>Fecha</th>
                                <th>Descripción del bien</th>
                                <th>Costo incorporación</th>
                                <th>Estado conservación</th>
                                <th>Usuario</th>
                                <th>Movimiento</th>
                                @if (auth()->user()->role == 0)    
                                <th>Opciones</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_baja"></tbody>
                         @foreach ($bajas as $baja)
                            <tr>
                                <th>
                                    <a href="/ver/{{ $baja->id }}">

            @if($baja->subgrupo_id == 3) <p>{{ $baja->grupo_id }} . 01 . {{ $baja->especie_id }}</p> 

            @elseif($baja->subgrupo_id == 4) <p>{{ $baja->grupo_id }} . 02 . {{ $baja->especie_id }}</p> 

            @elseif($baja->subgrupo_id == 5) <p>{{ $baja->grupo_id }} . 03 . {{ $baja->especie_id }}</p> 

            @elseif($baja->subgrupo_id == 6) <p>{{ $baja->grupo_id }} . 01 . {{ $baja->especie_id }}</p>

            @elseif($baja->subgrupo_id == 7) <p>{{ $baja->grupo_id }} . 02 . {{ $baja->especie_id }}</p>  

            @else {{ $baja->grupo_id }} . 0{{ $baja->subgrupo_id }} . {{ $baja->especie_id }} @endif
            
                                    </a>
                                </th>
                                <th>0{{ $baja->ubicacion_id }} . 0{{ $baja->sububicacion_id }}</th>
                                <th>{{ $baja->fecha }}</th>
                                <th>{{ $baja->descripcionbien }}</th>
                                <th>{{ $baja->costo_incorporacion }}</th>
                                <th>
                                    @if($baja->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($baja->estado_conservacion == 1)<p>R</p> @endif
                                    @if($baja->estado_conservacion == 2)<p>M</p> @endif
                                </th>
                                <th>{{ $baja->usuario }}</th>
                                <th>
                                    <i class="fa fa-times"> Dado baja</i> 
                                  
                                </th>

                            @if (auth()->user()->role == 0)    
                            <td>
                            <a href="/bajas/{{ $baja->id }}/edit" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>

                            <a href="/bajas/{{ $baja->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>

                            </td>
                            @endif
                            </tr>
                            @endforeach
                        </table>

                        <div class="text-center">
                            {!! $bajas->links(); !!}
                        </div>
                </div>
            </div>

</div>

    
@endsection

@section('scripts')

<script src="/js/users/grupos/index.js"></script>

<script type="text/javascript">

        $(document).on('change', '#select-grupo', function(event) {
    
        $('#grupo_id').val($("#select-grupo option:selected").text());
        $('#subgrupo_id').val($("#select-subgrupo option:selected").text());
        $('#especie_id').val($("#select-especie option:selected").text());

});
</script>

<script type="text/javascript">
        $(document).on('change', '#select-subgrupo', function(event) {
    
        $('#grupo_id').val($("#select-grupo option:selected").text());
        $('#subgrupo_id').val($("#select-subgrupo option:selected").text());
        $('#especie_id').val($("#select-especie option:selected").text());

});
</script>

<script type="text/javascript">
        $(document).on('change', '#select-especie', function(event) {
    
        $('#grupo_id').val($("#select-grupo option:selected").text());
        $('#subgrupo_id').val($("#select-subgrupo option:selected").text());
        $('#especie_id').val($("#select-especie option:selected").text());

});
</script>


@endsection