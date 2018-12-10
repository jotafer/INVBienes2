@extends('layouts.admin')

@section('contenido')


            <div class="panel panel-primary">
                <div class="panel-heading">Registrar Usuario</div>

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
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Nombre</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Contraseña <em> (Mínimo 8 caracteres)</em></label></label>
                            <input type="text" name="password" class="form-control" value="{{ old('password', str_random(8)) }}">
                        </div>

                        <div class="form-group">

                        <div id="mensaje"></div>

                        <div class="form-group">
                            <label for="email">Confirmar contraseña </label>
                            <input type="text" name="password2" class="form-control" onkeyup="comprobarClave();"/>
                        </div>                            

                        <label>Tipo de usuario</label>
                                <select name="role" class="form-control">
                                        <option value="1">Bodega</option>
                                        <option value="0">Administrador</option>
                                </select>
                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Guardar" id="guardar">
                        </div>
                    </form> 

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                            <tr>
                                <th>E-mail</th>
                                <th>Nombre</th>
                                <th>Tipo</th>
                                <th>Opciones</th>       
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>
                                    @if($user->role == 0)
                                        <span class="label label-danger">Admin</span>
                                    @else
                                        <span class="label label-primary">Bodega</span>
                                    @endif 
                                <td>
                                    <a href="/usuarios/{{ $user->id }}" class="btn btn-sm primary" title="Editar">
                                        <span class="glyphicon glyphicon-pencil"></span>
                                    </a>
                                    <a href="/usuarios/{{ $user->id }}/eliminar" class="btn btn-sm btn-danger" title="Dar de baja">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <div class="text-center">
                        {!! $users->links(); !!}
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
