@extends('layouts.app')

@section('content')


            <div class="panel panel-primary">
                <div class="panel-heading">Editar Grupo</div>

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
                            <label for="nombre">Nombre Grupo</label>
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $grupo->nombre) }}">
                        </div>

                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" name="codigo" class="form-control" value="{{ old('codigo', $grupo->codigo) }}">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Guardar Grupo</button>
                        </div>

                

                </div>
            </div>
        </div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalNuevoProveedor">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Nuevo Proveedor</h4>
      </div>
        <form action="proveedor/nuevo" method="POST">
        <div class="modal-body">
            <div class="form-group">
                <label for="nombre">Nombre Proveedor</label>
                <input type="text" class="form-control" name="nombre">
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@endsection

@section('scripts') 
    <script src="/js/admin/proveedores/nuevo.js"></script>
@endsection
