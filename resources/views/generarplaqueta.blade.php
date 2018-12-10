@extends('layouts.admin')

@section('contenido')


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div class="panel panel-primary">

        <div class="panel-heading">Inventario</div>
        <div class="panel-body">

        <div>

            {{ Form::open(['route' => 'generarplaqueta', 'method' => 'GET', 'class' => 'form-inline pull-right']) }} 
            {{Form::hidden('ubicacion_id', null, ['class' => 'form-control', 'id'=>'ubicacion_id', 'placeholder' => 'Ubicacion']) }}
            {{Form::hidden('sububicacion_id', null, ['class' => 'form-control', 'id'=>'sububicacion_id', 'placeholder' => 'Sub-ubicacion']) }}

            <select name="ubicacion_id" class="form-control" id="select-ubicacion">
                                    <option value="">Seleccione Ubicacion</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{$ubicacion->id}}">{{$ubicacion->dependenciamunicipal}}</option>
                                        @endforeach
                                        </select>

            <select name="sububicacion_id" class="form-control" id="select-sububicacion">
                                                <option value="">Seleccione Sububicacion</option>
            </select>
                 
                            
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                              
                        {{ Form::close() }}

        </div>

                    
            <div class="panel panel-success">
                <div class="panel-heading">

                        <h3 class="panel-title">Productos en Inventario</h3>  
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicación</th>
                                <th>Descripción del bien</th>
                                <th>Costo de incorporación</th>
                                <th>Estado de conservación</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_bienes_alta"></tbody>
                            @foreach ($inventariables as $inventariable)
                            <tr>
                                <th>
                                    <a href="/ver/{{ $inventariable->id }}">
                                {{ $inventariable->grupo_id }}.0{{ $inventariable->subgrupo_id }}.{{ $inventariable->especie_id }}
                                    </a>
                                </th>
                                <th>0{{ $inventariable->ubicacion_id }} . 0{{ $inventariable->sububicacion_id }}</th>
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


                </div>
            </div>

          

    

</div>

    
@endsection

@section('scripts')

<script src="/js/users/ubicaciones/index.js"></script>

<script type="text/javascript">
        $(document).on('change', '#select-ubicacion', function(event) {
    
        $('#ubicacion_id').val($("#select-ubicacion option:selected").text());
        $('#sububicacion_id').val($("#select-sububicacion option:selected").text());

});
</script>

<script type="text/javascript">
        $(document).on('change', '#select-sububicacion', function(event) {
    
        $('#ubicacion_id').val($("#select-ubicacion option:selected").text());
        $('#sububicacion_id').val($("#select-sububicacion option:selected").text());

});
</script>



@endsection