function registrarForm() {
	event.preventDefault();
	$.post('registrar', $("#formRegistrarEnviar").serialize(), function(data, textStatus, xhr) {
		$('#formRegistrar').fadeIn(1000, function() {
			if (data=="incorrecto") {
				alertify.alert('','Ups a ocurrido un error');
			} else if(data=="correcto") {
				alertify.alert('','Su registro fue exitoso puede Iniciar Sesión');
				$("#modalFormRegistrar").modal("hide");
			}else{
				$(this).html(data);
			}			
		});
	});
}
function registrar(){
	$("#modalFormRegistrar").modal();
	$.get('registrar', function(data) {
		$('#formRegistrar').fadeIn(1000, function() {
			$(this).html(data);
		});
	});
}