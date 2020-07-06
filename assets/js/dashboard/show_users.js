(function () {
	$("tr td #delete").click(function (ev) {
		ev.preventDefault();
		var fila = $(this).parents('tr').find('td:first').text();
		var id = $(this).attr('data_id');
		var self = this;
		Swal.fire({
			title: '¿Estás seguro que deseas eliminar el registro de ' + fila + '?',
			text: "¡No podrás revertir esto!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Sí',
			cancelButtonText: 'No'
		}).then((result) => {
			if (result.value) {
				$.ajax({
					type: 'POST',
					url: '/CodeIgniter/UsuariosController/delete',
					data: {'id': id},
					success: function () {
						$(self).parents('tr').remove();
						Swal(
							'Eliminado',
							'El registro se ha eliminado correctamente.',
							'success'
						)
					}, statusCode: {
						400: function (data) {
							var json = JSON.parse(data.responseText);
							Swal(
								'Error!',
								json.msg,
								'error'
							)
						}
					}
				});
			}
		})
	})

	$("#submit").click(function () {
		Swal.fire(
			'¡Correcto!',
			'El registro ha sidpo creado exitosamente.',
			'success'
		)
	})
})();
