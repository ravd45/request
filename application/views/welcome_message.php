<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Tickets</title>
	<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="<?= base_url('assets/js/messages.js') ?>"></script>
</head>
<body>
	<nav class="nav bg-info justify-content-center">
		<a class="nav-link active text-white" href="#">Tickets Qual-Edu</a>
		<a class="nav-link active" href="#"></a>
		<a class="nav-link text-info d-none" href="#" id="nombre_usuario"><?=$_SESSION['nombre']?></a>
		<a class="nav-link text-white" href="#" id="btn_cerrar"></a>
	</nav>
	<br><br>

	<div class="container"  id="login">
		<div class="row offset-sm-1">
			<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Usuario</span>
				</div>
				<input type="text" class="form-control" id="user" aria-describedby="basic-addon1">
			</div>
			</div>
			<div class="row offset-sm-1">
				<div class="input-group ">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Contraseña</span>
				</div>
				<input type="password" class="form-control" id="pass" aria-describedby="basic-addon1">
			</div>
			</div>
			<div class="row offset-sm-4">
				<span style="color:red;" id="msj"></span>
			</div>
			<div class="row offset-sm-10">
				<button id="btn_iniciar" type="button" class="btn btn-outline-info">Iniciar Sesión</button>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12" id="index_div"></div>
		</div>

		<footer class="page-footer bg-info">
			<div class="footer-copyright">
				<div class="container text-white">
					© 2019 Copyright QualEdu
					<a class="text-white text-lighten-4 right" href="www.qual-edu.org">Qual-Edu</a>
				</div>
			</div>
		</footer>


		<script >var base_url = "<?= base_url();?>index.php/"</script>
		<script src="<?= base_url('assets/jquery-3.3.1.min.js'); ?>"></script>
		<script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
		<script src="<?= base_url('assets/js/login/login.js'); ?>"></script>
	</body>
	</html>