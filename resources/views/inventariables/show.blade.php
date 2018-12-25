@extends('layouts.admin')

@section('contenido')


<div class="panel panel-primary">
		<div class="panel-heading">Inventario</div>

        <div class="panel-body">
			@if (count($errors) > 0)        	
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ error }}</li>
						@endforeach
					</ul>
				</div>
			@endif

			<table class="table table-bordered">
			<thead>
				<tr>
					<th>Codigo</th>
					<th>Fecha</th>
					<th>Proveedor</th>
					<th>Orden de compra</th>
					<th>Factura</th>
					<th>Precio Unitario</th>
				</tr>
			</thead>
			</tbody>
				<tr>
					<td id="alta_codigo">
						
            @if($inventariable->subgrupo_id == 3) <p>{{ $inventariable->grupo_id }} . 01 . {{ $inventariable->especie_id }}</p> 

            @elseif($inventariable->subgrupo_id == 4) <p>{{ $inventariable->grupo_id }} . 02 . {{ $inventariable->especie_id }}</p> 

            @elseif($inventariable->subgrupo_id == 5) <p>{{ $inventariable->grupo_id }} . 03 . {{ $inventariable->especie_id }}</p> 

            @elseif($inventariable->subgrupo_id == 6) <p>{{ $inventariable->grupo_id }} . 01 . {{ $inventariable->especie_id }}</p>

            @elseif($inventariable->subgrupo_id == 7) <p>{{ $inventariable->grupo_id }} . 02 . {{ $inventariable->especie_id }}</p>  

            @else {{ $inventariable->grupo_id }} . 0{{ $inventariable->subgrupo_id }} . {{ $inventariable->especie_id }} @endif



					</td>
					<td id="alta_fecha">{{ $inventariable->fecha }}</td>
					<td id="alta_proveedor">{{ $inventariable->proveedor }}</td>
					<td id="alta_orden_de_compra">{{ $inventariable->ordendecompra }}</td>
					<td id="alta_factura">{{ $inventariable->factura }}</td>
					<td id="alta_precio">{{ $inventariable->costo_incorporacion }}</td>
				</tr>
			</tbody>
			</table>

			<table class="table table-bordered">
			<tbody>
				<tr>
					<th>Descripcion Producto</th>
					<td>{{ $inventariable->descripcionbien }}</td>
				</tr>
				<tr>
					<th>Ubicación</th>
					<td>0{{ $inventariable->ubicacion_id }} . 0{{ $inventariable->sububicacion_id }}</td>
				</tr>
				<tr>
					<th>Estado conservacion</th>
					           	<td>
                                    @if($inventariable->estado_conservacion == 0)<p>B</p> @endif     
                                    @if($inventariable->estado_conservacion == 1)<p>R</p> @endif
                                    @if($inventariable->estado_conservacion == 2)<p>M</p> @endif
                                </td>
				</tr>
				<tr>
					<th>Observaciones</th>
					<td>{{ $inventariable->observaciones }}</td>
				</tr>
			</tbody>
		</table>

	</div>
</div>
@endsection

