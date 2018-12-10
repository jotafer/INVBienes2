@extends('layouts.admin')

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
                <div class="panel-heading">Registrar Proveedor</div>

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
                            <label for="nombre">Nombre Proveedor</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">

                        </div>



                        <div class="form-group">
                            <div class="form-group">
                                <button class="btn btn-success">Guardar</button>
                            </div>
                    </form>                   
                    </div>


 
                <div class="col-md-6">
                        <h4> Busqueda de proveedor </h4>
                </div>

                <div class="col-md-6">
                        {{ Form::open(['route' => 'proveedores.index', 'method' => 'GET', 'class' => 'form-inline pull-right']) }} 
                                    <div class="form-group">
                                        {{Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) }}
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-default">
                                            <span class="glyphicon glyphicon-search"></span>
                                        </button>
                                    </div>
                        {{ Form::close() }}
                </div>



                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Proveedor</th>
                                <th>Opciones</th>        
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr>
                                <td>{{ $proveedor->id }}</td>
                                <td>{{ $proveedor->nombre }}</td>

                                <td>
                                    <button type="button" class="btn btn-sm primary" title="Editar" data-proveedor="{{ $proveedor->id }}">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </button>
                                    </a>         
                  
                                    <a href="/proveedor/{{ $proveedor->id }}/eliminar" class="btn btn-sm btn-danger" title="Eliminar">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>        


                </div>
            </div>
        </div>
    </div>
 
@endsection

@section('scripts')
    <script src="/js/admin/proveedores/edit.js"></script>
@endsection
