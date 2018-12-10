@extends('layouts.admin')

@section('contenido')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Especie</div>

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
                            
                 <form action="" form="formulario" method="POST">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <select name="codigo" class="form-control" id="select-codigo">
                                <option value="">Seleccione Codigo</option>
                                <option value="001">001</option>
                                <option value="002">002</option>
                                <option value="003">003</option>
                                <option value="004">004</option>
                                <option value="005">005</option>
                                <option value="006">006</option>
                                <option value="007">007</option>
                                <option value="008">008</option>
                                <option value="009">009</option>
                                <option value="010">010</option>
                                <option value="011">011</option>
                                <option value="012">012</option>
                                <option value="013">013</option>
                                <option value="014">014</option>
                                <option value="015">015</option>
                                <option value="016">016</option>
                                <option value="017">017</option>
                                <option value="018">018</option>
                                <option value="019">019</option>
                                <option value="020">020</option>
                                <option value="021">021</option>
                                <option value="022">022</option>
                                <option value="023">023</option>
                                <option value="024">024</option>
                                <option value="025">025</option>
                                <option value="026">026</option>
                                <option value="027">027</option>
                                <option value="028">028</option>
                                <option value="029">029</option>
                                <option value="030">030</option>                                    
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

                        <div class="form-group">
                            <label>Subgrupo</label>
                            <select name="subgrupo_id" class="form-control" id="select-subgrupo">
                                    <option value="">Seleccione Subgrupo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="nombre">Nombre Especie</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                        </div>

                        <div class="form-group">


                            <input id="codigoSeleccionado" name="codsel" type="hidden">
                            <input id="grupoSeleccionado" name="gruposel" type="hidden">
                            <input id="subgrupoSeleccionado" name="gruposel" type="hidden">

                            <input id="codificacion" name="codificacion" type="hidden"> 

                        <div class="form-group">


                            <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Guardar" onClick="javascript:procesar();"/>
                            </div>
                    </form> 

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Codificacion</th>
                                <th>Opciones</th>        
                        </thead>
                        <tbody>
                            @foreach ($especies as $especie)
                            <tr>
                                <td>{{ $especie->codigo }}</td>
                                <td>{{ $especie->nombre }}</td>
                                <td>{{ $especie->codificacion }}</td>
  

                                <td>
                                    <a href="/especies/{{ $especie->id }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    @if ($especie->trashed())
                                    <a href="/especies/{{ $especie->id }}/restaurar" class="btn btn-sm-succes" title="Restaurar">
                                        <span class="glyphicon glyphicon-repeat"></span>
                                    </a>
                                    @else
                                    <a href="/especies/{{ $especie->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <div class="text-center">
                        {!! $especies->links(); !!}
                    </div>        


                </div>
            </div>
        </div>
 
@endsection

@section('scripts') 
    <script src="/js/admin/grupos/index.js"></script>

    <script type="text/javascript">
        $(document).on('change', '#select-subgrupo', function(event) {
    
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#subgrupoSeleccionado').val($("#select-subgrupo option:selected").text());
        $('#codigoSeleccionado').val($("#select-codigo option:selected").text());
});

        $(document).on('change', '#select-codigo', function(event) {
    
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#subgrupoSeleccionado').val($("#select-subgrupo option:selected").text());
        $('#codigoSeleccionado').val($("#select-codigo option:selected").text());
});

        $(document).on('change', '#select-grupo', function(event) {
    
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#subgrupoSeleccionado').val($("#select-subgrupo option:selected").text());
        $('#codigoSeleccionado').val($("#select-codigo option:selected").text());    
     
});
    </script>





    <script type="text/javascript">

        function procesar() {

        grupoSeleccionado=document.getElementById('grupoSeleccionado').value;
        subgrupoSeleccionado=document.getElementById('subgrupoSeleccionado').value;
        codigoSeleccionado=document.getElementById('codigoSeleccionado').value;

        codificacion=grupoSeleccionado+' , '+subgrupoSeleccionado+' , '+codigoSeleccionado;

        document.getElementById('codificacion').value=codificacion;

        document.forms.formulario.submit();

    }

    </script>    



@endsection
