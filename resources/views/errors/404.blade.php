@extends('layouts.admin')

@section('contenido')


            <div class="panel panel-primary">
                <div class="panel-heading">Not Found.</div>

                <div class="panel-body">

                    <P>Registro no encontrado.</P>

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
                            
                
@endsection