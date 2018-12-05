$(function() {
	alert('Script especies agregado');

	$('#select-subgrupo').on('change', onSelectSubgrupoChange);
});

function onSelectSubgrupoChange() {

	var subgrupo_id = $(this).val();

	if (! grupo_id) {
		$('#select-especie').html('<option value="">Seleccione Especie</option>');
		return;
	}
	// AJAX
	$.get('/api/subgrupo/'+subgrupo_id+'/especies', function (data) {
		var html_select = '<option value="">Seleccione Especie</option>';
		for (var i=0; i<data.length; ++i)
			//console.log(data[i]);	
			html_select += '<option value="'+data[i].id+'">'+data[i].codigo+' '+data[i].nombre+'</option>';
			//console.log(html_select);
		$('#select-especie').html(html_select);
	});

}

