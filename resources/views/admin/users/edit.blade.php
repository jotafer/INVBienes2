@extends('layouts.admin')

@section('contenido')


            <div class="panel panel-primary">
                <div class="panel-heading">Editar usuario</div>

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
                            
                 <form action="" name="formulario" method="POST">
                    {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input type="email" name="email" class="form-control" readonly value="{{ $user->email }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Contraseña <em>(Ingresar solo si se desea modificar)</em></label>
                            <input type="text" name="password" class="form-control" value="{{ old('password') }}" onkeyup="comprobarClave();"/>
                        </div>

                        <div id="mensaje"></div>

                        <div class="form-group">
                            <label for="email">Confirmar contraseña </label>
                            <input type="text" name="password2" class="form-control" onkeyup="comprobarClave();"/>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Guardar" id="guardar">
                        </div>

                

                </div>
            </div>
        </div>
 
@endsection

@section('scripts')


    <script type="text/javascript">

    function comprobarClave(){
        var password = document.formulario.password.value;
        var password2 = document.formulario.password2.value;
    
     if (password != password2) {
                                        document.getElementById("mensaje").innerHTML = "Las contraseñas no coinciden.";
                                        document.getElementById("guardar").disabled=true;
                                } else {
                                        document.getElementById("mensaje").innerHTML = "";
                                        document.getElementById("guardar").disabled=false;
                                }
                        }

    </script>


    

@endsection
