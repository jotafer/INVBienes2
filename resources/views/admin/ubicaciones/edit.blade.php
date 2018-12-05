@extends('layouts.admin')

@section('contenido')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditSububicacion">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title">Editar Sububicacion</h5>
      </div>
      <form action="/sububicacion/editar" method="POST">
        {{ csrf_field() }}
      <div class="modal-body">
            <input type="hidden" name="sububicacion_id" id="sububicacion_id" value="">
            <div class="form-group">
                <label for="nombre">Nombre sububicacion</label>
                <input type="text" class="form-control" name="subdependenciamunicipal" id="sububicacion_subdependenciamunicipal" value="">
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
                <div class="panel-heading">Editar Ubicacion</div>

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
                            <label for="dependenciamunicipal">Nombre Ubicacion</label>
                            <input type="text" name="dependenciamunicipal" class="form-control" value="{{ old('dependenciamunicipal', $ubicacion->dependenciamunicipal) }}">
                        </div>     

                        <div class="form-group">
                            <label for="codigo">Codigo</label>
                            <input type="number" name="codigo" class="form-control" value="{{ old('codigo', $ubicacion->codigo) }}">
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success">Guardar</button>
                        </div>
                </form>
                    </br>

                <div class="row">
                <div class="col-md-9">
                    <p>&nbsp&nbsp&nbsp Sub ubicaciones</p>
                    <form action="/sububicaciones" method="POST" class="form-inline">
                        {{ csrf_field() }}
                    <input type="hidden" name="ubicacion_id" value="{{ $ubicacion->id }}">
                        
<table style="width: 413px;">

<tr style="height: 3px;">

</tr>
<tr style="height: 26px;">
<td style="width: 123px; height: 26px;"><select id="select-codigo" class="form-control input-sm" name="codigo">
<option value="">Ingrese Codigo</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
</select></td>
<td style="width: 205px; height: 26px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input class="form-control input-sm" name="subdependenciamunicipal" type="text" placeholder="Ingrese nombre" /></td>
<td style="width: 79px; height: 26px;"><button class="btn btn-sm btn-primary">A&ntilde;adir</button></td>
</tr>
</tbody>
</table>


                    </form>

                </br>

                    <table class="table table-bordered" style="font-size:14px">
                        <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Sub dependencia municipal</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sububicaciones as $sububicacion)
                            <tr>
                                <td>{{ $sububicacion->codigo }}</td>
                                <td>{{ $sububicacion->subdependenciamunicipal }}</td>
                                <td>
                                    <button type="button" class="btn btn-xs primary" title="Editar" data-sububicacion="{{ $sububicacion->id }}">
                                        <span class="glyphicon glyphicon-pencil"></span></button>
                                    </a>
                                    <a href="/sububicacion/{{ $sububicacion->id }}/eliminar" class="btn btn-xs btn-danger" title="Dar de baja">
                                        <span class="glyphicon glyphicon-remove"></span>
                                    </a>                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                

                </div>
            </div>
        </div>
 
@endsection

@section('scripts') 

<script language="JavaScript" type="text/javascript" src="/js/admin/sububicaciones/edit.js"></script>

@endsection