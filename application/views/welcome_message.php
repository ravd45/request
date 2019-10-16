<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tickets</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/materialize.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>

	<div class="row" id="login">
		<div class="col s12 offset-s4">
			<div class="input-fields col s6">
				<label for="user">Usuario</label>
				<input  id="user" type="text" class="validate">
				<label for="pass">Contraseña</label>
				<input  id="pass" type="password" class="validate">
				<span style="color:red;" id="msj"></span>
			</div>
			<div class="col s12 offset-s6">
				<a id="btn_iniciar" class="btn-floating"><i class="material-icons">done</i></a>
			</div>
		</div>
	</div>
	<script >var base_url = "<?= base_url();?>index.php/"</script>
	<script src="<?= base_url('assets/jquery-3.3.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/materialize.js'); ?>"></script>
	<script src="<?= base_url('assets/js/login/login.js'); ?>"></script>
</body>
</html>