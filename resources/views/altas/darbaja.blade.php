@extends('layouts.app')

@section('content')


            <div class="panel panel-primary">
                <div class="panel-heading">Formulario de Alta de bienes</div>

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
                                        <td><input type="text" name="proveedor" class="form-control" value="{{ old('proveedor') }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="ordendecompra">Orden de Compra:</label></td>
                                        <td><input type="text" name="ordendecompra" class="form-control" value="{{ old('ordendecompra') }}"></td>
                                    </tr>
                                    <tr>
                                        <td><label for="proveedor">Factura:</label></td>
                                        <td><input type="text" name="factura" class="form-control" value="{{ old('factura') }}"></td>
                                    </tr>
                                </table>
                        </div>

                        <div class="row">
                        </br>
                            <div class="col-md-6">
                                <table>
                                    <tr>
                                        <td><label for="proveedor">Fecha:&nbsp&nbsp</label></td>
                                        <td><input class="form-control" type="date" placeholder="Date" name="fecha"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
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
                                        <td><label for="Especie">Especie:</label></td>
                                        <td><input type="text" name="especie" class="form-control" value="{{ old('especie') }}"></td>
                                        <td>
                                    </tr>
                                </table>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                            </br>
                            <table>
                                    <tr>
                                        <td><label for="cantidad">Cantidad:</label></td>
                                        <td><input type="number" name="cantidad" class="form-control" value="{{ old('cantidad') }}"></td>
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
