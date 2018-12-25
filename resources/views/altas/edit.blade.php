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
                            
            <form action="" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="descripcion">Descripcion del grupo de especies:</label>
                    <input type="text" name="descripcion" class="form-control" value="{{ $altaesp->descripcion }}">
                </div>

                <div class="form-group">
                    <button class="btn btn-success">Guardar</button>
                </div> 
            </form>

        </br>
        </br>


                    <p>Proveedores</p>
                    <form action="/proveedores" method="POST" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" name="nombre" type="text" placeholder="Ingrese nombre">
                            <input type="hidden" name="altaesp_id" value="{{ $altaesp->id }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn btn-primary">Añadir</button>
                        </div>
                    </form>

                </br>

                    <table class="table table-bordered" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>Nombre prov.</th>
                                <th>Opciones</th>
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
            @if($inventariable->subgrupo_id == 3) <p>{{ $inventariable->grupo_id }} . 01 . {{ $inventariable->especie_id }} . 0{{ $key+1 }}</p> 

            @elseif($inventariable->subgrupo_id == 4) <p>{{ $inventariable->grupo_id }} . 02 . {{ $inventariable->especie_id }} . 0{{ $key+1 }}</p> 

            @elseif($inventariable->subgrupo_id == 5) <p>{{ $inventariable->grupo_id }} . 03 . {{ $inventariable->especie_id }}. 0{{ $key+1 }}</p> 

            @elseif($inventariable->subgrupo_id == 6) <p>{{ $inventariable->grupo_id }} . 01 . {{ $inventariable->especie_id }}. 0{{ $key+1 }}</p>

            @elseif($inventariable->subgrupo_id == 7) <p>{{ $inventariable->grupo_id }} . 02 . {{ $inventariable->especie_id }}. 0{{ $key+1 }}</p>  

            @else {{ $inventariable->grupo_id }} . 0{{ $inventariable->subgrupo_id }} . {{ $inventariable->especie_id }} . 0{{ $key+1 }} @endif
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
    <script src="/js/admin/proveedores/edit.js"></script>

    <script type="text/javascript">

    $(function() {
        $( "#datepicker" ).datepicker({  maxDate: new Date });
    });

    </script>

@endsection
