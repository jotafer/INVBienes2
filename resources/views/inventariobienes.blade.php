@extends('layouts.admin')

@section('contenido')


<div class="panel panel-primary">

        <div class="panel-heading">Inventario</div>

        <div class="panel-body">
                    
            <div class="panel panel-success">
                <div class="panel-heading">

                        <h3 class="panel-title">Productos en Alta</h3>  
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th>Descripción del bien</th>
                                <th>Costo de incorporación</th>
                                <th>Estado de conservación</th>
                                <th>Movimiento</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_alta"></tbody>
                            @foreach ($altas as $alta)
                            <tr>
                                <th>
                                    <a href="/ver/{{ $alta->id }}">
                                {{ $alta->grupo_id }}.0{{ $alta->subgrupo_id }}.{{ $alta->especie_id }}
                                    </a>
                                </th>
                                <th>{{ $alta->ubicacion_id }}</th>
                                <th>{{ $alta->descripcionbien }}</th>
                                <th>{{ $alta->costo_incorporacion }}</th>
                                <th>
                                    @if($alta->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($alta->estado_conservacion == 1)<p>R</p> @endif
                                    @if($alta->estado_conservacion == 2)<p>M</p> @endif
                                </th>
                                <th> 
                                    <a href="/inventariables/{{$alta->id}}/traslado" class="btn btn-success btn-xs" style='width:80px; height:30px; font-size:14px'>Trasladar</a>
                                    </br>
                                    <a href="/inventariables/{{$alta->id}}/darbaja" class="btn btn-primary btn-xs" style='width:80px; height:30px; font-size:14px'>Dar baja</a>
                                </th>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th>Descripción del bien</th>
                                <th>Costo de incorporación</th>
                                <th>Estado de conservación</th>
                                <th>Movimiento</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_traslado"></tbody>
                         @foreach ($traslados as $traslado)
                            <tr>
                                <th>
                                    <a href="/ver/{{ $traslado->id }}">
                                {{ $traslado->grupo_id }}.0{{ $traslado->subgrupo_id }}.{{ $traslado->especie_id }}
                                    </a>
                                </th>
                                <th>{{ $traslado->ubicacion_id }}</th>
                                <th>{{ $traslado->descripcionbien }}</th>
                                <th>{{ $traslado->costo_incorporacion }}</th>
                                <th>
                                    @if($traslado->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($traslado->estado_conservacion == 1)<p>R</p> @endif
                                    @if($traslado->estado_conservacion == 2)<p>M</p> @endif
                                </th>
                                <th> 
                                     <a href="/inventariables/{{$traslado->id}}/traslado" class="btn btn-success btn-xs" style='width:80px; height:30px; font-size:14px'>Trasladar</a>
                                    </br>
                                    <a href="/inventariables/{{$traslado->id}}/darbaja" class="btn btn-primary btn-xs" style='width:80px; height:30px; font-size:14px'>Dar baja</a>
                                </th>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th>Descripción del bien</th>
                                <th>Costo de incorporación</th>
                                <th>Estado de conservación</th>
                                <th>Movimiento</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_baja"></tbody>
                         @foreach ($bajas as $baja)
                            <tr>
                                <th>
                                    <a href="/ver/{{ $baja->id }}">
                                {{ $baja->grupo_id }}.0{{ $baja->subgrupo_id }}.{{ $baja->especie_id }}
                                    </a>
                                </th>
                                <th>{{ $baja->ubicacion_id }}</th>
                                <th>{{ $baja->descripcionbien }}</th>
                                <th>{{ $baja->costo_incorporacion }}</th>
                                <th>
                                    @if($baja->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($baja->estado_conservacion == 1)<p>R</p> @endif
                                    @if($baja->estado_conservacion == 2)<p>M</p> @endif
                                </th>
                                <th> 
                                  
                                </th>
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