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
                <div class="col-md-8">
                    <h3>Proveedores de {{ $altaesp->descripcion }}</h3>
                    <form action="/proveedores" method="POST" class="form-inline">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" name="nombre" type="text" placeholder="Ingrese nombre">
                            <input type="hidden" name="altaesp_id" value="{{ $altaesp->id }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">Añadir</button>
                        </div>
                    </form>

                </br>

                    <table class="table table-bordered" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>Nombre proveedor</th>
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
