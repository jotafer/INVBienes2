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
                            


            <div class="row">
                <div class="col-md-4">
                    <p>Proveedores</p>
                    <form action="/proveedores" method="POST" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control input-sm" name="nombre" type="text" placeholder="Ingrese nombre">
                            <input type="hidden" name="altaesp_id" value="{{ $altaesp->id }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-primary">Añadir</button>
                        </div>
                    </form>

                </br>

                    <table class="table table-bordered" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>Nombre prov.</th>
                                <th>Movimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->nombre }}</td>
                                <td>
                                    <button type="button" class="btn btn-xs primary" title="Editar" data-proveedor="{{ $proveedor->id }}">
                                        <span class="glyphicon glyphicon-pencil"></span></button>
                                    </a>
                                    <a href="/proveedor/{{ $proveedor->id }}/eliminar" class="btn btn-xs btn-danger" title="Dar de baja">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                <div class="col-md-8">
                    <p>Inventariables</p>
                    <div class="col-md-4">
                    <form action="/inventariables" method="POST" class="form-inline">
                        {{ csrf_field() }}
                        <table>
                            <tr>
                                <td> <h6>Proveedor</h6> </td>
                                <td>
                                        <select name="proveedor" class="form-control input-sm">
                                        <option value="">Seleccione Proveedor</option>
                                            @foreach ($proveedores as $proveedor)
                                        <option value="{{$proveedor->nombre}}">{{$proveedor->nombre}}</option>
                                            @endforeach
                                        </select>
                                </td>



                                <td> <h6>&nbsp&nbspPrecio unitario</h6></td>
                                <td>
                                    <input type="number" min="1" max="99999999" name="costo_incorporacion" class="form-control input-sm" value="{{ old('costo_incorporacion') }}">
                                </td>

                                    </tr>
                                    <tr>
                                        <td><h6>Orden de Compra:</h6></td>
                                        <td><input type="text" name="ordendecompra" class="form-control input-sm" value="{{ old('ordendecompra') }}"></td>

                                        <td><h6>&nbsp&nbspEstado</h6></td>
                                        <td><select name="estado_conservacion" class="form-control input-sm">
                                            <option value="">Seleccione Estado</option>
                                                <option value="0">Bueno</option>
                                                <option value="1">Regular</option>
                                                <option value="2">Malo</option>
                                            </select>
                                        </td>

                                    </tr>
                                    <tr>
                                        <td><h6>Factura:</h6></td>
                                        <td><input type="number" min="1" max="9999" name="factura" class="form-control input-sm" value="{{ old('factura') }}"></td>

                                        <td><h6>Destino:</h6></td>
                                        <td><select name="ubicacion_id" class="form-control input-sm" id="select-ubicacion">
                                    <option value="">Seleccione Destino</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{$ubicacion->id}}">{{$ubicacion->dependenciamunicipal}}</option>
                                        @endforeach
                                </select></td>
                                    </tr>
                                    <tr>
                                        <td><h6>Fecha:&nbsp&nbsp</h6></td>
                                        <td><input type="text" id="datepicker" name="fecha"></td>
                                        <td><h6>Descr.</td>
                                        <td><input type="text" name="descripcionbien" class="form-control input-sm" value="{{ old('descripcionbien') }}"></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <input type="hidden" name="altaesp_id" value="{{ $altaesp->id }}">
                                        <input type="hidden" name="grupo_id" value="{{ $altaesp->grupo_id }}">
                                        <input type="hidden" name="subgrupo_id" value="{{ $altaesp->subgrupo_id }}">
                                        <input type="hidden" name="especie_id" value="{{ $altaesp->especie_id }}">
                                        <input type="hidden" name="usuario" value="{{ Auth::user()->name }}">
                                        <td><center><button class="btn btn-sm btn-primary">Dar alta</button></td>
                                </table>
                            
                            </br>
                        </div>
                    </form>

            </div>

            <div>                     
                    <table class="table table-bordered" style="font-size:15px">
                        <thead>
                            <tr>
                                <th>Inventario</th>
                                <th>Destino</th>
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
                                <td>{{ $inventariable->ubicacion_id }}</td>
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


                 </div>

              

@endsection

@section('scripts') 

    <script src="/js/users/inventariables/jquery.js"></script>
    <script src="/js/users/inventariables/jquery-ui.js"></script>
    <script src="/js/users/grupos/index.js"></script>
    <script src="/js/admin/proveedores/edit.js"></script>

    <script type="text/javascript">

    $(function() {
        $( "#datepicker" ).datepicker({  maxDate: new Date });
    });

    </script>

@endsection
