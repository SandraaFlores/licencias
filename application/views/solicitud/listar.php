<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	<link rel="stylesheet" href="<?= base_url('assets/libs/sweetalert2/dist/sweetalert2.min.css') ?>">
	<link rel="stylesheet" href="<?= base_url('assets/css/forms.css') ?>">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
		  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Mostrar licencias</title>
</head>

<body>
<div class="container">
	<div class="row pt-4">
		<div class="col-sm-12 mx-auto" style="padding: 50px">
			<h5 class="text-center">Tabla de usuarios registrados</h5>
			<table class="table table-bordered">
				<thead>
				<tr>
					<th scope="col">Id</th>
					<th scope="col">Usuario</th>
					<th scope="col">Fecha</th>
					<th scope="col">Acciones</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($solicitudes as $item): ?>
					<tr>
						<th scope="row"><?= $item->id ?></th>
						<td><?= $item->name. " ". $item->first_name." ".$item->last_name?></td>
						<td><?= $item->create_time?></td>
						<td><a class="btn btn-success" href="#" id="edit" role="button"><i class="fa fa-edit"></i></a> <a
								class="btn btn-danger" href="#" id="delete" data_id="<?= $item->id ?>" role="button"><i class="fa fa-trash-o"></i></a></td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</body>
</html>