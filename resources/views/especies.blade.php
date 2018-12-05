@extends('layouts.admin')
@section('contenido')
<div class="row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
        <h3>Listado de Especies
        @if (auth()->user()->role == 0) 
            <a href="libro/create">
                <button class="btn btn-success">Nuevo</button></a>
                @endif
                                                                </h3>

    </div>
</div>

            <div>
                {{ Form::open(['route' => 'especiesalta', 'method' => 'GET', 'class' => 'form-inline pull-right']) }} 
                                    <div class="form-group">
                                        {{Form::text('descripcionespecie', null, ['class' => 'form-control', 'placeholder' => 'Descripción especie']) }}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                                </br>
                                </br>
                {{ Form::close() }}

            </div>



<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-condensed table-hover">
                <thead>
                    <th>Id inventario</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                </thead>
                            @foreach ($altaesps as $altaesp)
                            <tr>
                                <th>

            <a href="/altaesp/{{ $altaesp->id }}">

            @if($altaesp->subgrupo_id == 3) <p>{{ $altaesp->grupo_id }} . 01 . {{ $altaesp->especie_id }}</p> 

            @elseif($altaesp->subgrupo_id == 4) <p>{{ $altaesp->grupo_id }} . 02 . {{ $altaesp->especie_id }}</p> 

            @elseif($altaesp->subgrupo_id == 5) <p>{{ $altaesp->grupo_id }} . 03 . {{ $altaesp->especie_id }}</p> 

            @elseif($altaesp->subgrupo_id == 6) <p>{{ $altaesp->grupo_id }} . 01 . {{ $altaesp->especie_id }}</p>

            @elseif($altaesp->subgrupo_id == 7) <p>{{ $altaesp->grupo_id }} . 02 . {{ $altaesp->especie_id }}</p>  

            @else {{ $altaesp->grupo_id }} . 0{{ $altaesp->subgrupo_id }} . {{ $altaesp->especie_id }} @endif

                                    </a>
                                </th>
                                <th>{{ $altaesp->descripcionespecie }}</th>
                                <td>
                                    <a href="/especies/{{ $altaesp->id }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="/especies/{{ $altaesp->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>

                            </tr>
                            @endforeach
                </table>
                    
                    <div class="text-center">
                        {!! $altaesps->links(); !!}
                    </div>
        </div>

    </div>
</div>

    
@endsection