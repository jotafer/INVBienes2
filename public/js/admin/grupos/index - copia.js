$(function() {
	//alert('Script agregado');
	$('#select-grupo').on('change', onSelectGrupoChange);
});

function onSelectGrupoChange() {

	var grupo_id = $(this).val();

	if (! grupo_id) {
		$('#select-subgrupo').html('<option value="">Seleccione Subgrupo</option>');
		return;
	}
	// AJAX
	$.get('api/grupo/'+grupo_id+'/subgrupos', function (data) {
		var html_select = '<option value="">Seleccione Subgrupo</option>';
		for (var i=0; i<data.length; ++i)
			//console.log(data[i]);	
			html_select += '<option value="'+data[i].id+'">'+data[i].codigo+' '+data[i].nombre+'</option>';
			//console.log(html_select);
		$('#select-subgrupo').html(html_select);
	});

}

