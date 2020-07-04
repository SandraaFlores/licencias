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
          <br>
					<form method="post" action="<?=base_url()."/UsuariosController/verifica";?>">

						<div class="form-group row mx-0 px-3">
							<label class="col-lg-6 col-form-label form-control-label" for="name">Usuario:</label>
							<input type="text" class="form-control col-lg-3" placeholder="Usuario" id="user" name='user' required>
						</div>
						<div class="form-group row mx-0">
							<label class="col-lg-4 col-form-label form-control-label" for="password">Contraseña</label>
							<input type="password" class="form-control col-lg-6" placeholder="Contraseña"
								   name="password" ="password" required>
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
