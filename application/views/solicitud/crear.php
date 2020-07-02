<?php
$conexion = mysqli_connect('localhost', 'root', '', 'licencias');
if (!$conexion) {
	echo 'Error';
} else {
	echo 'Conectado';
}
?>

<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="styles.css">
	<title>Solicitar Licencia</title>
</head>

<body>
<div class="container">
	<div class="row pt-4">
		<div class="col-sm-12 mx-auto">
			<div class="panel panel-default">
				<div class="panel-heading col-sm-12">
					<div class="col-sm-3 mx-auto">
						<img src="assets/images/optima.png" alt="Optima" width="200" height="70">
					</div>
					<div class="col-sm-9 mx-auto">
						<h4 class="mb-0 text-left">Registro de usuarios en platafoma SAP.</h4>
						<h4 class="mb-0 text-left">Departamento de Sistemas.</h4>
					</div>
				</div>
				<div class="panel-body" style="padding: 50px">
					<form method="post" action="<?=base_url("solicitudController/insert");?>">
						<h4 align="right">
							<?php
							date_default_timezone_set("America/Mexico_City");
							$fechaActual = date('d-m-Y');
							echo $fechaActual;
							?>
						</h4>
						<div class="form-group row mx-0 px-3">
							<label class="col-lg-6 col-form-label form-control-label" for="name">Nombre(s) del
								solicitante:</label>
							<input type="text" class="form-control col-lg-3" placeholder="Nombre(s)" id="name" required>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="first-name">Primer
								apellido:</label>
							<input type="text" class="form-control col-lg-6" placeholder="Primer apellido"
								   id="first-name" required>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="last-name">Segundo
								apellido</label>
							<input type="text" class="form-control col-lg-6" placeholder="Segundo apellido"
								   id="last-name" required>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="departments">Departamento:</label>
							<select id="departments" name="departments" class="form-control col-lg-6" required>
								<option value="0">Seleccione una opción:</option>
								<?php
								$sql = "SELECT * FROM departments";
								$query = $conexion -> query ($sql);
								while ($valores = mysqli_fetch_array($query)) {
									echo "<option value='".$valores['id']."'>".$valores['name']."</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="system">Sistema:</label>
							<select id="system" name="system" class="form-control col-lg-6" required>
								<option value="0">Seleccione una opción:</option>
								<?php
								$sql = "SELECT * FROM systems";
								$query = $conexion -> query ($sql);
								while ($valores = mysqli_fetch_array($query)) {
									echo "<option value='".$valores['id']."'>".$valores['name']."</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="role">Función del
								usuario:</label>
							<input type="text" class="form-control col-lg-6" placeholder="Función del usuario" id="role"
								   required>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label"
								   for="justification">Justificación:</label>
							<textarea id="justification" name="justification" rows="4" cols="10"
									  placeholder="Escribe una justificación de tu solicitud aquí."
									  class="form-control col-lg-6" required></textarea>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label"
								   for="authorizations">Autorizaciones requeridas:</label>
							<textarea id="authorizations" name="authorizations" rows="4" cols="10"
									  placeholder="Escribe las autorizaciones requeridas de tu solicitud aquí (opcional)."
									  class="form-control col-lg-6"></textarea>
						</div>
						<div class="form-group row mx-0 autocomplete">
							<label class="col-lg-4 col-form-label form-control-label" for="userCopy">Copia del
								usuario:</label>
							<input type="text" class="form-control col-lg-6" placeholder="Copia del usuario"
								   id="userCopy">
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="types_of_user">Tipo de usuario:</label>
							<select id="types_of_user" name="types_of_user" class="form-control col-lg-6" required>
								<option value="0">Seleccione una opción:</option>
								<?php
								$sql = "SELECT * FROM types_of_users";
								$query = $conexion -> query ($sql);
								while ($valores = mysqli_fetch_array($query)) {
									echo "<option value='".$valores['id']."'>".$valores['name']."</option>";
								}
								?>
							</select>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="observation">Observaciones
								generales:</label>
							<textarea id="observation" name="observation" rows="4" cols="10"
									  placeholder="Escribe tus observaciones generales aquí (opcional)."
									  class="form-control col-lg-6"></textarea>
						</div>
						<div class="form-group row mx-0">
							<button type="submit" class="btn btn-info btn-small btn-responsive" id="aceptar">Aceptar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>

</html>
