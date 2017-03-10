var url_root = "http://192.168.1.72/codeigniter/login/";

function generarPost() {
	$('#tablaPost').DataTable({
		dom: "Bfrtip",
		responsive: true,
		select: true,
		"processing": true,
		"serverSide": true,
		"ajax": {
			"url": url_root + 'cargar',
			"type": "POST"
		},
		columnDefs: [{
			responsivePriority: 1,
			targets: [0, 1]
		}],
		columns: [{
			data: 0,
			title: "#",
			orderable: false
		}, {
			data: 1,
			title: "Titulo"
		}, {
			data: 2,
			title: "Cuerpo"
		}, {
			data: 3,
			orderable: false
		}, {
			data: 4,
			orderable: false
		}],
		buttons: [{
			text: '<i class="fa fa-plus"></i> Post',
			action: function(e, dt, node, config) {
				cargarForm();
			},
			className: 'btn btn-success'
		}, {
			extend: 'collection',
			text: '<i class="fa fa-save"></i> Guardar',
			className: 'btn btn-primary',
			buttons: [{
				extend: 'excel',
				text: '<span class="fa fa-file-excel-o" style="color:green;"></span> Excel'
			}, {
				extend: 'pdf',
				text: '<span class="fa fa-file-pdf-o" style="color:red;"></span> PDF',
				download: 'open'
			}]
		}],
		"language": {
			"sProcessing": "Procesando...",
			"sLengthMenu": "Mostrar _MENU_ ",
			"sZeroRecords": "No se encontraron resultados",
			"sEmptyTable": "Ningún dato disponible en esta tabla",
			"sInfo": " _START_ al _END_ de un total de _TOTAL_ ",
			"sInfoEmpty": "Mostrando  del 0 al 0 de un total de 0 ",
			"sInfoFiltered": "(filtrado de un total de _MAX_ )",
			"sInfoPostFix": "",
			"sSearch": "Buscar:",
			"sUrl": "",
			"sInfoThousands": ",",
			"sLoadingRecords": "Cargando...",
			"oPaginate": {
				"sFirst": "Primero",
				"sLast": "Último",
				"sNext": "Siguiente",
				"sPrevious": "Anterior"
			},
			"oAria": {
				"sSortAscending": ": Activar para ordenar la columna de manera ascendente",
				"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}
	});

}
$(document).ready(function($) {
	generarPost();
});

function enviarForm(id) {
	event.preventDefault();
	var ruta, mensaje;
	if (id == null) {
		ruta = "nuevo";
		mensaje = "Registro Correcto";
	} else {
		ruta = "actualizar/" + id;
		mensaje = "Actualizacion Correcta";
	}
	$.post(url_root + ruta, $("#formPostEnviar").serialize()).done(function(data) {
		if (data == 'incorrecto') {
			alertify.alert('', 'Ups ocurrio un error vuelve a intentarlo mas tarde!');
		} else if (data == 'correcto') {
			$("#tablaPost").dataTable().fnDestroy();
			generarPost();
			$("#modalFormPost").modal("hide");
			alertify.alert('', mensaje);

		} else {
			$("#formPost").html(data);
		}
	});
};

function cargarForm(id) {
	$("#modalFormPost").modal();
	var ruta;
	if (id == null) {
		ruta = "nuevo";
	} else {
		ruta = "actualizar/" + id;
	}
	$.get(url_root + ruta, function(data) {
		$("#formPost").html(data);
	});
}

function eliminar(id, post) {
	alertify.confirm('', '¿Realmente desea eliminar el Post "' + post + '"?',
		function() {
			$.get(url_root + 'eliminar/' + id, function(data) {
				if (data == 1) {
					$("#tablaPost").dataTable().fnDestroy();
					generarPost();
				}
			}).fail(function() {
				alertify.alert('', 'Ups ocurrio un error vuelve a intentarlo mas tarde')
			});
		},
		function() {
			alertify.error('Cancel')
		})
}