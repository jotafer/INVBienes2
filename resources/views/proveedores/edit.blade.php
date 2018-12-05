@extends('layouts.app')

@section('content')
            <div class="panel panel-primary">
                <div class="panel-heading">Editar Proveedor</div>

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
                            <input type="text" name="nombre" class="form-control" value="{{ old('nombre', $grupo->nombre) }}">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Guardar Proveedor</button>
                        </div>

                

                </div>
            </div>
        </div>


 
@endsection

@section('scripts')
    <script src="/js/admin/proveedores/edit.js"></script>
@endsection

