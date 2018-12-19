@extends('layouts.admin2')

@section('contenido')

<link href="{{ URL::asset('css/estilos.css') }}" rel="stylesheet" type="text/css"/>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditProveedor">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">Editar Proveedor</h5>
      </div>
      <form action="/proveedor/editar" method="POST">
        {{ csrf_field() }}
      <div class="modal-body">
            <input type="hidden" name="proveedor_id" id="proveedor_id" value="">
            <div class="form-group">
                <label for="nombre">Nombre proveedor</label>
                <input type="text" class="form-control" name="nombre" id="proveedor_nombre" value="">
            </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
      </div>
  </form>
    </div>
  </div>
</div> 

            <div class="panel panel-primary">
                <div class="panel-heading">Formulario de alta de bienes: {{ $altaesp->descripcion }}</div>

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


    <form action="/inventariables" method="POST">
    {{ csrf_field() }}

                <label> Descripción bien:</label>
                <input type="text" name="descripcionbien" class="form-control" value="{{ old('descripcionbien') }}">

                <label> Proveedor: <a href="/proveedores/{{$altaesp->id}}"> Listado de proveedores</a></label> 
                <select name="proveedor" class="form-control">
                                        <option value="">Seleccione Proveedor</option>
                                            @foreach ($proveedores as $proveedor)
                                        <option value="{{$proveedor->nombre}}">{{$proveedor->nombre}}</option>
                                            @endforeach
                                        </select>

<table cellspacing="10" cellpadding="10" width="100%">
<tr>
  
 
<td style="padding:0 0px 0 0px;"><label>Orden de compra:</label></td>
<td style="padding:0 0px 0 15px;"><label>Factura:</label></td>
<td style="padding:0 0px 0 15px;"><label>Fecha:</label></td>
<td style="padding:0 0px 0 15px;"><label>Precio unitario:</label></td>

  
</tr>

<td style="padding:0 0px 0 0px;"><input type="text" name="ordendecompra" class="form-control" value="{{ old('ordendecompra') }}"></td>
<td style="padding:0 0px 0 15px;"><input type="number" min="1" max="999999" name="factura" class="form-control" value="{{ old('factura') }}"></td>
<td style="padding:0 0px 0 15px;"><input type="text" id="datepicker" name="fecha" class="form-control"></td>
<td style="padding:0 0px 0 15px;"><input type="number" min="1" max="99999999" name="costo_incorporacion" class="form-control" value="{{ old('costo_incorporacion') }}"><td>

  
</table>

<table cellspacing="10" cellpadding="10" width="100%">
<tr>
  
 
<td style="padding:0 0px 0 0px;"><label>Destino:</label></td>
<td style="padding:0 0px 0 15px;"><label>Sub destino:</label></td>


  
</tr>

<td style="padding:0 0px 0 0px;">
                <select name="ubicacion_id" class="form-control" id="select-ubicacion">
                                <option value="">Seleccione Destino</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                <option value="{{$ubicacion->id}}">{{$ubicacion->dependenciamunicipal}}</option>
                                        @endforeach
                </select>


</td>


<td style="padding:0 0px 0 15px;">
                <select name="sububicacion_id" class="form-control" id="select-sububicacion">
                                <option value="">Seleccione Sub destino</option>
                </select>

</td>
</table>

<label> Estado conservación:</label>
<select name="estado_conservacion" class="form-control">
                                                <option value="">Seleccione Estado</option>
                                                <option value="0">Bueno</option>
                                                <option value="1">Regular</option>
                                                <option value="2">Malo</option>
                                            </select>

                <input type="hidden" name="altaesp_id" value="{{ $altaesp->id }}">
                <input type="hidden" name="grupo_id" value="{{ $altaesp->grupo_id }}">
                <input type="hidden" name="subgrupo_id" value="{{ $altaesp->subgrupo_id }}">
                <input type="hidden" name="especie_id" value="{{ $altaesp->especie_id }}">
                <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">

                <center><button class="btn btn-success">Dar alta</button></center>


    </form>


                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Ubicacion</th>
                                <th>Descripción bien</th>
                                <th>Costo incorporacion</th>
                                <th>Estado</th>
                                <th>Usuario</th>
                                <th>Movimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inventariables as $key => $inventariable)
                            <tr>
                                <td>
                                    {{ $inventariable->grupo_id }} . 0{{ $inventariable->subgrupo_id }} . {{ $inventariable->especie_id }} . 0{{ $key+1 }}
                                </td>
                                <td>0{{ $inventariable->ubicacion_id }} . 0{{ $inventariable->sububicacion_id }}</td>
                                <td>{{ $inventariable->descripcionbien }}</td>
                                <td>{{ $inventariable->costo_incorporacion }}</td>
                                <td>
                                    @if($inventariable->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($inventariable->estado_conservacion == 1)<p>R</p> @endif
                                    @if($inventariable->estado_conservacion == 2)<p>M</p> @endif
                                </td>
                                <td>{{ $inventariable->usuario }}</td>
                                <td> 

                                     @if ($inventariable->movimiento_id == 2)

                                     <i class="fa fa-times"> Dado baja</i>

                                    @else


                                    <a href="/inventariables/{{$inventariable->id}}/traslado" class="btn-default btn-sm" style='width:80px; height:30px; font-size:14px'><i class="fa fa-truck"></i>  Trasladar</a>
                                    </br>
                                    <a href="/inventariables/{{$inventariable->id}}/darbaja" class="btn-default btn-sm" style='width:80px; height:30px; font-size:14px'><i class="fa fa-arrow-down"></i>  Dar baja</a>

                                    @endif                       
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>     


              

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
