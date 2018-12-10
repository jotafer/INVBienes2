@extends('layouts.admin')

@section('contenido')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


            <div class="panel panel-primary">
                <div class="panel-heading">Formulario de Alta de Especie</div>

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

                    
                        <div class="col-md-6">
                            </br>
                                <table>
                                    <tr>
                                        <td><label for="grupo">Grupo:</label></td>
                                        <td>
                                            <select name="grupo_id" class="form-control" id="select-grupo">
                                                <option value="">Seleccione Grupo</option>
                                                @foreach ($grupos as $grupo)
                                                        <option value="{{$grupo->codigo}}">{{$grupo->codigo}} - {{$grupo->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Subgrupo:</label></td>
                                        <td>
                                            <select name="subgrupo_id" class="form-control" id="select-subgrupo">
                                                <option value="">Seleccione Subgrupo</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><label>Especie:</label></td>
                                        <td>
                                            <select name="especie_id" class="form-control" id="select-especie">
                                                <option value="">Seleccione Especie</option>
                                            </select>
                                        <td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                        <td>&nbsp</td>
                                    </tr>
                                    <tr>
                                        <td><label>Descripcion:&nbsp&nbsp&nbsp</label></td>
                                        <td><input type="text" name="descripcion" class="form-control" value="{{ old('descripcion') }}"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                    </tr>   
    
                                </table>
                        


                            <div class="form-group">
                            </br>


                            <div class="form-group">

                            <input id="grupoSeleccionado" name="gruposel" type="hidden">
                            <input id="subgrupoSeleccionado" name="subgruposel" type="hidden">
                            <input id="especieSeleccionado" name="especiesel" type="hidden">

                            <input id="codificacion" name="codificacion" type="hidden">    

                            </div>    

                            <div class="form-group">
                            

                            <input type="submit" class="btn btn-success" value="Guardar" onClick="javascript:procesar();"/>
                            
                            
                   
                    </form>


                </div>
                </div>

        </div>
    </div>



                
 
@endsection

@section('scripts')

    <script src="/js/users/grupos/index.js"></script>

    <script type="text/javascript">
        $(document).on('change', '#select-especie', function(event) {
    
        $('#grupoSeleccionado').val($("#select-grupo option:selected").text());
        $('#subgrupoSeleccionado').val($("#select-subgrupo option:selected").text());
        $('#especieSeleccionado').val($("#select-especie option:selected").text());
      
     
});
    </script>

    <script type="text/javascript">

        function procesar() {

        grupoSeleccionado=document.getElementById('grupoSeleccionado').value;
        subgrupoSeleccionado=document.getElementById('subgrupoSeleccionado').value;
        especieSeleccionado=document.getElementById('especieSeleccionado').value;

        codificacion=grupoSeleccionado+' , '+subgrupoSeleccionado+' , '+especieSeleccionado;

        document.getElementById('codificacion').value=codificacion;

        document.forms.formulario.submit();

    }

    </script>

    

@endsection
