@extends('layouts.admin2')

@section('contenido')


            <div class="panel panel-primary">
                <div class="panel-heading">Formulario de Baja de bienes:    {{ $inventariable->descripcionbien }}</div>

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

                        <div class="col-md-6">

                            </br>
                                <table>
                                    <tr>
                                    
                                    </tr>
                                        <td colspan="4"><input type="text" name="descripcionbien" class="form-control" readonly value="{{ $inventariable->descripcionbien }}"></td>
                                    <tr>
                                    <tr>
                                        <td></td>
                                        <td></td>

                                    </tr>
                                    <tr>
                                        <td><label for="fecha">Fecha:&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</label></td>
                                        <td><input type="text" id="datepicker" name="fecha"></td>
                                    </tr>
                                    <tr>
                                         <td><label for="estado_conservacion">Estado conservacion:</label></td>
                                        <td><select name="estado_conservacion" class="form-control">
                                                <option value="">Seleccione Estado</option>
                                                <option value="0">Bueno</option>
                                                <option value="1">Regular</option>
                                                <option value="2">Malo</option>
                                            </select>
                                        </td>
                                    </tr>
                                </table>
                        </div>

                        <div class="row">
                        </br>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td><label for="proveedor">Proveedor:</label></td>
                                        <td><input type="text" name="proveedor" class="form-control" readonly value="{{ $inventariable->proveedor }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="ordendecompra">Orden de Compra:</label></td>
                                        <td><input type="text" name="ordendecompra" class="form-control" readonly value="{{ $inventariable->ordendecompra }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="proveedor">Factura:</label></td>
                                        <td><input type="text" name="factura" class="form-control" readonly value="{{ $inventariable->factura }}"></td>
                                    </tr>
                                </table>

                            </div>


                        </div>

                    </br>

                        <div class="col-md-6">
                            </br>
                                <table>
                                    <tr>
                                        <td><label for="grupo">Grupo:</label></td>
                                        <td><input type="text" name="grupo" class="form-control" readonly value="{{ $inventariable->grupo_id }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Subgrupo:</label></td>
                                        <td><input type="text" name="grupo" class="form-control" readonly value="0{{ $inventariable->subgrupo_id }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label>Especie:</label></td>
                                        <td><input type="text" name="grupo" class="form-control" readonly value="{{ $inventariable->especie_id }}"></td>
                                    </tr>
                                        <td></td>
                                        <td></td>

                                    <tr>
                                       <input type="hidden" name="movimiento_id" value="2">

                                    </tr>
                                </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            </br>
                            <table>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><label for="preciounitario">Precio Unitario:</label></td>
                                        <td><input type="text" name="preciounitario" class="form-control" readonly value="{{ $inventariable->costo_incorporacion }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="destino">Destino:</label></td>
                                        <td><select name="ubicacion_id" class="form-control" id="select-ubicacion">
                                                    <option value="">Seleccione Destino</option>
                                                            @foreach ($ubicaciones as $ubicacion)
                                                    <option value="{{$ubicacion->id}}">{{$ubicacion->id}} - {{$ubicacion->dependenciamunicipal}}</option>
                                                            @endforeach
                                                </select></td>
                                    </tr>
                                        <td><label>Sub destino:</label></td>
                                        <td><select name="sububicacion_id" class="form-control" id="select-sububicacion">
                                                <option value="">Seleccione Sub destino</option>
                                            </select>
                                        </td>
                                </table>
                                 </div>


                        </div>

                            <div class="form-group">
                            </br>
                            &nbsp&nbsp&nbsp&nbsp<button class="btn btn-success">Dar de Baja</button>
                            </div>
                    </form> 

@endsection

@section('scripts') 

    <script src="/js/users/inventariables/jquery.js"></script>
    <script src="/js/users/inventariables/jquery-ui.js"></script>
    <script src="/js/users/grupos/index.js"></script>
    <script src="/js/admin/proveedores/edit.js"></script>
    <script src="/js/users/ubicaciones/index.js"></script>

    <script type="text/javascript">

    $(function() {
        $( "#datepicker" ).datepicker({  maxDate: new Date });
    });

    </script>

@endsection