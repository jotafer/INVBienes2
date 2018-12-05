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
                            
                 <form action="" method="POST">
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
                            <label for="email">Contraseña</label>
                            <input type="text" name="password" class="form-control" value="{{ old('password', str_random(8)) }}">
                        </div>

                        <div class="form-group">

                        <label>Tipo de usuario</label>
                                <select name="role" class="form-control">
                                        <option value="1">Bodega</option>
                                        <option value="0">Administrador</option>
                                </select>
                        </div>

                            <div class="form-group">
                            <button class="btn btn-success">Registrar Usuario</button>
                            </div>
                    </form> 

                    <table class="table table-bordered">
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
