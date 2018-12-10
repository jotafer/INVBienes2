$(function() {
	//alert('Script ubicaciones agregado');

	$('#select-ubicacion').on('change', onSelectUbicacionChange);

});

function onSelectUbicacionChange() {

	var ubicacion_id = $(this).val();

	if (! ubicacion_id) {
		$('#select-ubicacion').html('<option value="">Seleccione Sub destino</option>');
		return;
	}
	// AJAX
	$.get('/api/ubicacion/'+ubicacion_id+'/sububicacion', function (data) {
		var html_select = '<option value="">Seleccione Sub destino</option>';
		for (var i=0; i<data.length; ++i)
			//console.log(data[i]);	
			html_select += '<option value="'+data[i].codigo+'">'+data[i].codigo+' '+data[i].subdependenciamunicipal+'</option>';
			//console.log(html_select);
		$('#select-sububicacion').html(html_select);
	});

}

