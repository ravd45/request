$('#btn_iniciar').click(function() {
	usuario = $('#user').val();
	pass = $('#pass').val();
	ruta = base_url + 'Welcome/login';
	var nombre = "<?= $_SESSION['nombre']; ?>";
	$.ajax({
		url: ruta,
		type: 'POST',
		dataType: 'json',
		data: {usuario:usuario, pass:pass},

	})
	.done(function(data) {
		if (data.datos != '') {
			$('#msj').html(data.datos);
		}else{
			$('#login').attr('hidden', 'true');
			$('#index_div').html(data.str_view);
			$('#btn_cerrar').html('Cerrar Sesión');
			$('#nombre_usuario').removeClass('text-info');
			$('#nombre_usuario').addClass('text-white');
			$('#nombre_usuario').html(nombre);
		}
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {	
	});
	
});