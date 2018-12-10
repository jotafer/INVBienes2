@extends('layouts.admin')

@section('contenido')



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


                <label>Seleccione especie</label>  


                </br>
                </br>

                </div>
                <div class="panel-body">
                   <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Descripción especie</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_especies_alta"></tbody>
                            @foreach ($altaesps as $altaesp)
                            <tr>
                                <th>

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
                                    <a href="/proveedores/{{$altaesp->id}}" class="btn btn-primary btn-sm">
                                    <span class="glyphicon glyphicon-list"></span>&nbsp&nbspProveedores</button>            

                                </th>

                            </tr>
                            @endforeach
                    </table>

                   

                </div>
            </div>

           

</div>

    
@endsection
