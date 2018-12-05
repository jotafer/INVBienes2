@extends('layouts.app')

@section('content')



            <div class="panel panel-primary">
                <div class="panel-heading">Formulario de Alta de bien</div>

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
                                        <td><label for="proveedor">Proveedor:</label></td>
                                        <td>
                                            <select name="proveedor" class=" form-control">
                                                <option value="">Seleccione Proveedor</option>
                                                @foreach ($proveedores as $proveedor)
                                                <option value="{{$proveedor->nombre}}">{{$proveedor->nombre}}</option>
                                                @endforeach
                                            </select>
                                            
                                        </td>
                                        <td>


                                       
                                    </tr>
                                    <tr>
                                        <td><label for="ordendecompra">Orden de Compra:</label></td>
                                        <td><input type="text" name="ordendecompra" class="form-control" value="{{ old('ordendecompra') }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="proveedor">Factura:</label></td>
                                        <td><input type="number" name="factura" class="form-control" value="{{ old('factura') }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="fecha">Fecha:&nbsp&nbsp</label></td>
                                        <td><input class="form-control" type="date" placeholder="Date" name="fecha"></td>
                                    </tr>
                                </table>
                        </div>

                        <div class="row">
                        </br>
                            <div class="col-md-6">

                                    <table>
                                    <tr>
                                        <td>
                                            <a href="/proveedores" class="btn btn-primary btn-sm">
                                            <span class="glyphicon glyphicon-plus"></span> Nuevo proveedor</button>

                                        </td>
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
                                            <select name="especie" class="form-control" id="select-especie">
                                                <option value="">Seleccione Especie</option>
                                            </select>
                                        <td>
                                    </tr>
                                        <td><label for="numero">Numero:</label></td>
                                        <td><input type="number" name="numero" class="form-control" value="{{ old('numero') }}"></td>

                                    <tr>
                                        <td><label for="destino">Estado conservacion:</label></td>
                                        <td><select name="estado_conservacion" class="form-control">
                                    <option value="">Seleccione Estado</option>
                                            <option value="0">Bueno</option>
                                            <option value="1">Regular</option>
                                            <option value="2">Malo</option>
                                </select></td>

                                    </tr>
                                </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            </br>
                            <table>
                                    <tr>
                                        <td></td>
                                        <td><input type="hidden" name="cantidad" value="1"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="preciounitario">Precio Unitario:</label></td>
                                        <td><input type="text" name="preciounitario" class="form-control" value="{{ old('preciounitario') }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="destino">Destino:</label></td>
                                        <td><select name="ubicacion_id" class="form-control" id="select-ubicacion">
                                    <option value="">Seleccione Destino</option>
                                        @foreach ($ubicaciones as $ubicacion)
                                            <option value="{{$ubicacion->id}}">{{$ubicacion->codigo}} - {{$ubicacion->dependenciamunicipal}}</option>
                                        @endforeach
                                </select></td>
                                    </tr>
                                </table>
                        </div>


                        </div>

                            <div class="form-group">
                            </br>
                            &nbsp&nbsp&nbsp&nbsp<label for="descripcionbien">Descripcion del bien:</label>
                            &nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" name="descripcionbien" class="form-control" value="{{ old('descripcionbien') }}">
                            </div>


                            <div class="form-group">
                            </br>
                            &nbsp&nbsp&nbsp&nbsp<button class="btn btn-success">Registrar Alta</button>
                            </div>
                    </form>


                
 
@endsection

@section('scripts')

    <script src="/js/users/grupos/index.js"></script>

@endsection
