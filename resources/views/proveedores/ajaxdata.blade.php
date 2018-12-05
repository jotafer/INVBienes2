@extends('layouts.app')

@section('content')


            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Grupo</div>

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
                            <label for="nombre">Nombre Proveedor</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        </div>


                        <div class="form-group">


                            <div class="form-group">
                            <button class="btn btn-success">Registrar Proveedor</button>
                            </div>
                    </form> 

                    <table id="proveedor_table" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Codigo</th>
                                <th>Opciones</th>        
                        </thead>
                        <tbody>
                            @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $grupo->nombre }}</td>
                                <td>{{ $grupo->codigo }}</td>

                                <td>
                                    <a href="/grupos/{{ $grupo->codigo }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    @if ($grupo->trashed())
                                    <a href="/grupos/{{ $grupo->codigo }}/restaurar" class="btn btn-sm-succes" title="Restaurar">
                                        <span class="glyphicon glyphicon-repeat"></span>
                                    </a>
                                    @else
                                    <a href="/grupos/{{ $grupo->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
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
