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
                            
                 <form action="" method="POST">
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
                            <input type="text" name="password" class="form-control" value="{{ old('password') }}">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Guardar</button>
                        </div>

                

                </div>
            </div>
        </div>
 
@endsection
