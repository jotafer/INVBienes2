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
					<td id="alta_codigo">{{ $inventariable->grupo_id }}.0{{ $inventariable->subgrupo_id }}.{{ $inventariable->especie_id }}</td>
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
					<td id="alta_cantidad">{{ $inventariable->descripcionbien }}</td>
				</tr>
				<tr>
					<th>Destino</th>
					<td id="alta_destino">{{ $inventariable->ubicacion_id }}</td>
				</tr>
				<tr>
					<th>Observaciones</th>
					<td id="alta_observaciones">{{ $inventariable->observaciones }}</td>
				</tr>
			</tbody>
		</table>

	</div>
</div>
@endsection
