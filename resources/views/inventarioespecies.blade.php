@extends('layouts.admin')

@section('contenido')


        <h3> Listado de especies &nbsp&nbsp<a href="/altas/altaespecie"><button class="btn btn-success">Nueva</button></a></h3> 

        <div class="panel-heading"></div>

                    <div>
                {{ Form::open(['route' => 'inventarioespecies', 'method' => 'GET', 'class' => 'form-inline pull-right']) }} 
                                    <div class="form-group">
                                        {{Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Descripción especie']) }}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                        {{ Form::close() }}

            </div>


                <h3 class="panel-title">Especies en Alta</h3>  


                </br>
                </br>

                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Descripción especie</th>
                                <th>Movimiento</th>
                            @if (auth()->user()->role == 0)
                                <th>Opciones</th>
                            @endif
                            </tr>

                        </thead>
                        <tbody id="dashboard_especies_alta"></tbody>
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
                                <th>{{ $altaesp->descripcion }}</th>
                                <th>
                                    <a href="/nuevaalta/{{$altaesp->id}}" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-plus"></span> Nueva alta</button>          
                                </th>

                                @if (auth()->user()->role == 0)
                                <th>

                                    <a href="/altaesp/{{ $altaesp->id }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    @if ($altaesp->trashed())
                                    <a href="/altaesp/{{ $altaesp->id }}/restaurar" class="btn btn-sm-succes" title="Restaurar">
                                        <span class="glyphicon glyphicon-repeat"></span>
                                    </a>
                                    @else
                                    <a href="/altaesp/{{ $altaesp->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    @endif  
                                </th>

                                @endif
                            </tr>
                            @endforeach
                    </table>

                   

                </div>
            </div>

           

</div>

    
@endsection