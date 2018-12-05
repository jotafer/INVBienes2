$(function() {
	$('[data-sububicacion]').on('click', editSububicacionModal);
});

function editSububicacionModal() {
	// id
	var sububicacion_id = $(this).data('sububicacion');
	$('#sububicacion_id').val(sububicacion_id);
	// name
	var sububicacion_subdependenciamunicipal = $(this).parent().prev().text();
	$('#sububicacion_subdependenciamunicipal').val(sububicacion_subdependenciamunicipal);
	// show
	$('#modalEditSububicacion').modal('show');
}

	