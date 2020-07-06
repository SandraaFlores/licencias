<!DOCTYPE html>
<html>
<head>
	<title>Solicitar Licencia</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1"/>
	<link rel="stylesheet" href="<?= base_url('assets/libs/sweetalert2/dist/sweetalert2.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/forms.css') ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #1f00b4;">
	<a class="navbar-brand" href="<?= base_url('inicio') ?>">Avante</a>

	<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<li class="nav-item active">
				<a class="nav-link" href="<?= base_url('solicitudes/new') ?>">Solicitar Licencia</a>
			</li>
			<? if ($this->session->userdata()) {
				?>
				<li class="nav-item active">
					<a class="nav-link" href="#"><i class="fa fa-user"></i> </a>
				</li>
				<li class="nav-item active">
					<a class=" nav-link" href="<?= base_url('UsuariosController/logout') ?>"><i
							class="fa fa-sign-out"></i> Cerrar Sesión</a>
				</li>
				<?
			} else {
				?>
				<li class="nav-item active">
					<a class=" nav-link" href="<?= base_url('InicioController/login') ?>"><i class="fa fa-sign-in"></i>
						Iniciar Sesión</a>
				</li>
				<?
			} ?>
		</ul>
	</div>
</nav>
