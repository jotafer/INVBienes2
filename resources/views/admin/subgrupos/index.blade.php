@extends('layouts.admin')

@section('contenido')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Subgrupo</div>

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
                            <label for="codigo">Codigo</label>
                            <select name="codigo" class="form-control" id="select-codigo">
                                <option value="">Seleccione codigo</option>
                                <option value="00">00</option>
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
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>  
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre Subgrupo</label>
                             <select name="nombre" class="form-control" id="select-nombre">
                                <option value="">Seleccione nombre</option>
                                <option value="Vehículos Terrestres para uso productivo">Vehículos Terrestres para Uso Productivo</option>
                                <option value="Vehículos Terrestres para uso administrativo">Vehículos Terrestres para uso administrativo</option>
                                <option value="Máquinas de Oficina">Máquinas de Oficina</option>
                                <option value="Equipos Computacionales">Equipos Computacionales</option>
                                <option value="Equipos Varios">Equipos Varios</option>
                                <option value="Muebles de Oficina">Muebles de Oficina</option>
                                <option value="Sin subgrupo">Sin subgrupo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Grupo</label>
                            <select name="grupo_id" class="form-control" id="select-grupo">
                            <option value="">Seleccione Grupo</option>
                            @foreach ($grupos as $grupo)
                                    <option value="{{$grupo->id}}">{{$grupo->codigo}} - {{$grupo->nombre}}</option>
                                @endforeach
                            </select>
                        </div>

                            <input id="codigoSeleccionado" name="codigo" type="hidden">
                            <input id="nombreSeleccionado" name="nombre" type="hidden">
                            <input id="grupoSeleccionado" name="grupo" type="hidden">

                            <input id="codificacion" name="codificacion" type="hidden"> 

                        <div class="form-group">


                            <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Guardar" onClick="javascript:procesar();"/>
                            </div>


                    </form> 

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Codificación</th>
                                <th>Nombre</th>
                                <th>Opciones</th>        
                        </thead>
                        <tbody>
                            @foreach ($subgrupos as $subgrupo)
                            <tr>
                                <td>{{ $subgrupo->codificacion }}</td>
                                <td>{{ $subgrupo->nombre }}</td>                               
                                <td>
                                    <a href="/subgrupos/{{ $subgrupo->id }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    @if ($subgrupo->trashed())
                                    <a href="/subgrupos/{{ $subgrupo->id }}/restaurar" class="btn btn-sm-succes" title="Restaurar">
                                        <span class="glyphicon glyphicon-repeat"></span>
                                    </a>
                                    @else
                                    <a href="/subgrupos/{{ $subgrupo->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    @endif
                                </td>
                                @endforeach
                            </tr>
                            
                        </tbody>
                    </table>
                    
                    <div class="text-center">
                        {!! $subgrupos->links(); !!}
                    </div>        


                </div>
            </div>
        </div>
 
@endsection

@section('scripts')


    <script type="text/javascript">
    
        $(document).on('change', '#select-nombre', function(event) {
    
        $('#nombreSeleccionado').val($("#select-nombre option:selected").text());
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#codigoSeleccionado').val($("#select-codigo option:selected").text());

});
        $(document).on('change', '#select-grupo', function(event) {
    
        $('#nombreSeleccionado').val($("#select-nombre option:selected").text());
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#codigoSeleccionado').val($("#select-codigo option:selected").text());
});

        $(document).on('change', '#select-codigo', function(event) {
    
        $('#nombreSeleccionado').val($("#select-nombre option:selected").text());
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#codigoSeleccionado').val($("#select-codigo option:selected").text());
});
    </script>



    <script type="text/javascript">

        function procesar() {

        nombreSeleccionado=document.getElementById('nombreSeleccionado').value;
        grupoSeleccionado=document.getElementById('grupoSeleccionado').value;
        codigoSeleccionado=document.getElementById('codigoSeleccionado').value;    
        

        codificacion=grupoSeleccionado+' , '+codigoSeleccionado+' '+nombreSeleccionado;

        document.getElementById('codificacion').value=codificacion;

        document.forms.formulario.submit();

    }

    </script>


@endsection
