@extends('layouts.admin2')

@section('contenido')

<link href="{{ URL::asset('css/estilos.css') }}" rel="stylesheet" type="text/css"/>



            <div class="panel panel-primary">
                <div class="panel-heading">Editar inventariable: {{$alta->descripcionbien}}</div>

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

                <label> Descripción bien:</label>
                <input type="text" name="descripcionbien" class="form-control" value="{{ old('descripcionbien', $alta->descripcionbien) }}">

               

<table cellspacing="10" cellpadding="10" width="100%">
<tr>
  
 
<td style="padding:0 0px 0 0px;"><label>Orden de compra:</label></td>
<td style="padding:0 0px 0 15px;"><label>Factura:</label></td>
<td style="padding:0 0px 0 15px;"><label>Fecha:</label></td>
<td style="padding:0 0px 0 15px;"><label>Precio unitario:</label></td>

  
</tr>

<td style="padding:0 0px 0 0px;">
<input type="text" name="ordendecompra" class="form-control" value="{{ old('ordendecompra', $alta->ordendecompra) }}">
</td>
<td style="padding:0 0px 0 15px;">
<input type="number" min="1" max="999999" name="factura" class="form-control" value="{{ old('factura', $alta->factura) }}">
</td>
<td style="padding:0 0px 0 15px;">
<input type="text" id="datepicker" name="fecha" class="form-control" value="{{ old('fecha', $alta->fecha) }}">
</td>
<td style="padding:0 0px 0 15px;">
<input type="number" min="1" max="99999999" name="costo_incorporacion" class="form-control" value="{{ old('costo_incorporacion', $alta->costo_incorporacion) }}">
<td>

  
</table>

<table cellspacing="10" cellpadding="10" width="100%">
<tr>
  
  
</tr>




</table>

<label> Estado conservación:</label>
<select name="estado_conservacion" class="form-control">
                                                <option value="">Seleccione Estado</option>
                                                <option value="0">Bueno</option>
                                                <option value="1">Regular</option>
                                                <option value="2">Malo</option>
                                            </select>


                <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">

                <center><button class="btn btn-success">Guardar</button></center>


    </form>


   


              

@endsection

@section('scripts') 

    <script src="/js/users/inventariables/jquery.js"></script>
    <script src="/js/users/inventariables/jquery-ui.js"></script>
    <script src="/js/users/grupos/index.js"></script>
    <script src="/js/users/ubicaciones/index.js"></script>
    <script src="/js/admin/proveedores/edit.js"></script>

    <script type="text/javascript">

    $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat: 'dd-mm-yy',  
            maxDate: new Date 
        });
    });

    </script>

@endsection
