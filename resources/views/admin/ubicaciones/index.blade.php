@extends('layouts.admin')

@section('contenido')


            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Ubicacion</div>

                <div class="panel-body">

                    @if (session('notification'))
                        <div class="alert alert-success">
                            {{ session('notification') }}
                        </div>
                    @endif    

                    @if (count($errors) > 0)
                        </div class="alert alert-danger">

                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif    
                            
                 <form action="" method="POST">
                    {{ csrf_field() }}


                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" name="codigo" class="form-control" value="{{ old('codigo') }}">
                        </div>

                        <div class="form-group">
                            <label for="dependenciamunicipal">Dependencia Municipal</label>
                            <input type="text" name="dependenciamunicipal" class="form-control" value="{{ old('dependenciamunicipal') }}">
                        </div>


                        <div class="form-group">


                            <div class="form-group">
                            <button class="btn btn-success">Registrar Ubicacion</button>
                            </div>
                    </form> 

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Dependencia Municipal</th>
                                <th>Opciones</th>       
                        </thead>
                        <tbody>
                            @foreach ($ubicaciones as $ubicacion)
                            <tr>
                                <td>
                                    <a href="/ubicaciones/{{ $ubicacion->id }}">
                                            {{ $ubicacion->codigo }}
                                                                        </td>

                                <td>{{ $ubicacion->dependenciamunicipal }}</td>

                                <td>
                                    <a href="/ubicaciones/{{ $ubicacion->id }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    @if ($ubicacion->trashed())
                                    <a href="/ubicaciones/{{ $ubicacion->id }}/restaurar" class="btn btn-sm-succes" title="Restaurar">
                                        <span class="glyphicon glyphicon-repeat"></span>
                                    </a>
                                    @else
                                    <a href="/ubicaciones/{{ $ubicacion->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>        


                </div>
            </div>
        </div>
 
@endsection
