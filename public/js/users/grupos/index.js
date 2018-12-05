$(function() {
	//alert('Script especies agregado');

	$('#select-grupo').on('change', onSelectGrupoChange);
	$('#select-subgrupo').on('change', onSelectSubgrupoChange);
});

function onSelectGrupoChange() {

	var grupo_id = $(this).val();

	if (! grupo_id) {
		$('#select-subgrupo').html('<option value="">Seleccione Subgrupo</option>');
		return;
	}
	// AJAX
	$.get('/api/grupo/'+grupo_id+'/subgrupo', function (data) {
		var html_select = '<option value="">Seleccione Subgrupo</option>';
		for (var i=0; i<data.length; ++i)
			//console.log(data[i]);	
			html_select += '<option value="'+data[i].id+'">'+data[i].codigo+' '+data[i].nombre+'</option>';
			//console.log(html_select);
		$('#select-subgrupo').html(html_select);
	});

}

function onSelectSubgrupoChange() {

	var subgrupo_id = $(this).val();

	if (! subgrupo_id) {
		$('#select-especie').html('<option value="">Seleccione Especie</option>');
		return;
	}
	// AJAX
	$.get('/api/subgrupo/'+subgrupo_id+'/especie', function (data) {
		var html_select = '<option value="">Seleccione Especie</option>';
		for (var i=0; i<data.length; ++i)
			//console.log(data[i]);	
			html_select += '<option value="'+data[i].codigo+'">'+data[i].codigo+' '+data[i].nombre+'</option>';
			//console.log(html_select);
		$('#select-especie').html(html_select);
	});

}