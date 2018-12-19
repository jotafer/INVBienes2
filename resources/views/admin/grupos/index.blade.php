@extends('layouts.admin')

@section('contenido')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


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
                            
                 <form action="" name="formulario" method="POST">
                    {{ csrf_field() }}



                    <div class="form-group">
                        <label>Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                    </div>

                        <div class="form-group">
                            <label for="codigo">Codigo:</label>
                             <select name="codigo" class="form-control" id="select-grupo">
                                <option value="">Seleccione codigo</option>
                                <option value="01">01</option>
                                <option value="02">02</option>
                                <option value="03">03</option>
                                <option value="04">04</option>
                                <option value="05">05</option>
                                <option value="06">06</option>
                                <option value="07">07</option>
                                <option value="08">08</option>
                                <option value="09">09</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>  
                            </select>
                        </div>


                            <input id="nombreSeleccionado" name="nombre" type="hidden">
                            <input id="grupoSeleccionado" name="codigo" type="hidden">

                            <input id="codificacion" name="codificacion" type="hidden"> 

                        <div class="form-group">


                            <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Guardar" onClick="javascript:procesar();"/>
                            </div>
                    </form> 

                    <table class="table table-striped table-bordered table-condensed table-hover">
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
                                    <a href="/grupos/{{ $grupo->id }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    @if ($grupo->trashed())
                                    <a href="/grupos/{{ $grupo->id }}/restaurar" class="btn btn-sm-succes" title="Restaurar">
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
                    </table>


                    <div class="text-center">
                        {!! $grupos->links(); !!}
                    </div>         
                                
                </div>
            </div>
        </div>
 
@endsection

@section('scripts')


    <script type="text/javascript">
    
        $(document).on('change', '#select-grupo', function(event) {
    
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#nombreSeleccionado').val($("#select-nombre option:selected").text());

});
        $(document).on('change', '#select-nombre', function(event) {
    
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#nombreSeleccionado').val($("#select-nombre option:selected").text());

});
    </script>





    <script type="text/javascript">

        function procesar() {

        grupoSeleccionado=document.getElementById('grupoSeleccionado').value;
        nombreSeleccionado=document.getElementById('nombreSeleccionado').value;


        codificacion=grupoSeleccionado+' '+nombreSeleccionado;

        document.getElementById('codificacion').value=codificacion;

        document.forms.formulario.submit();

    }

    </script>


@endsection
