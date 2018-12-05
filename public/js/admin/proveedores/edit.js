$(function() {
	$('[data-proveedor]').on('click', editProveedorModal);
});

function editProveedorModal() {
	// id
	var proveedor_id = $(this).data('proveedor');
	$('#proveedor_id').val(proveedor_id);
	// name
	var proveedor_nombre = $(this).parent().prev().text();
	$('#proveedor_nombre').val(proveedor_nombre);
	// show
	$('#modalEditProveedor').modal('show');
}

	