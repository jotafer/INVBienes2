@extends('layouts.admin2')

@section('contenido')



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
                <div class="panel-heading">{{ $altaesp->descripcion }}</div>

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




<div class="col-md-12">
<h3>Inventariables</h3>
</br>
<form action="/inventariables" method="POST" class="form-inline">
    {{ csrf_field() }}

<table>
<tbody>
<tr>
<td><label>Proveedor:</label></td>
<td><select class="form-control" name="proveedor">
<option value="">Seleccione Proveedor</option>
@foreach ($proveedores as $proveedor)
<option value="{{$proveedor->nombre}}">{{$proveedor->nombre}}</option>
@endforeach</select></td>
<td>&nbsp&nbsp&nbsp<label>Precio unitario:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label>
<td>
        <input type="number" min="1" max="99999999" name="costo_incorporacion" class="form-control " value="{{ old('costo_incorporacion') }}">
</td>
<td></td>
</tr>
<tr>
<td><label>Orden de compra:</label>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</td>
<td><input type="text" name="ordendecompra" class="form-control" value="{{ old('ordendecompra') }}"></td>
<td>&nbsp&nbsp&nbsp<label>Estado:</label></td>
                                        <td><select name="estado_conservacion" class="form-control">
                                            <option value="">Seleccione Estado</option>
                                                <option value="0">Bueno</option>
                                                <option value="1">Regular</option>
                                                <option value="2">Malo</option>
                                            </select>
                                        </td>
</tr>
<tr>
<td><label>Factura:</label></td>
<td><input type="number" min="1" max="9999" name="factura" class="form-control" value="{{ old('factura') }}"></td>
<td>&nbsp&nbsp&nbsp<label>Destino:</label></td>
<td><select name="ubicacion_id" class="form-control" id="select-ubicacion">
                                    <option value="">Seleccione Destino</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{$ubicacion->id}}">{{$ubicacion->dependenciamunicipal}}</option>
                                        @endforeach
                                </select></td>

</tr>
<tr>
<td><label>Fecha:</label></td>
<td><input type="text" id="datepicker" name="fecha" class="form-control"></td>
<td>&nbsp&nbsp&nbsp<label>Sub Destino:&nbsp&nbsp&nbsp</label></td>
<td><select name="sububicacion_id" class="form-control" id="select-sububicacion">
                                                <option value="">Seleccione Sububicacion</option>
    </select>
</td>
</tr>
<tr>
<td></td>
<td></td>
<td>&nbsp&nbsp&nbsp<label>Descripcion:&nbsp&nbsp&nbsp</label></td>
<td><input class="form-control" name="descripcionbien" type="text" value="{{ old('descripcionbien') }}" /></td>
<td></td>
</tr>
<tr>
<td>&nbsp;</td>
</tr>
</tbody>
</table>
<div class="form-group">
<div class="form-group"><input id="grupoSeleccionado" name="gruposel" type="hidden" /> <input id="subgrupoSeleccionado" name="subgruposel" type="hidden" /> <input id="especieSeleccionado" name="especiesel" type="hidden" /> <input id="codificacion" name="codificacion" type="hidden" /></div>
<input type="hidden" name="altaesp_id" value="{{ $altaesp->id }}">
<input type="hidden" name="grupo_id" value="{{ $altaesp->grupo_id }}">
<input type="hidden" name="subgrupo_id" value="{{ $altaesp->subgrupo_id }}">
<input type="hidden" name="especie_id" value="{{ $altaesp->especie_id }}">
<input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
<div class="form-group"><input class="btn btn-success" type="submit" value="Guardar" /></div>
</br>
</br>
</div>
</form>


            <div>                     
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
