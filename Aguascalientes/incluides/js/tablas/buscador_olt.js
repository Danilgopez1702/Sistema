$(document).ready(function () {
	console.log("entro")
	var table = $('#dataTable').DataTable({
		"ajax": {
			"url": "../../../base_datos/ajax/tablas/consulta_olt.php",
			"method": 'POST', //usamos el metodo POST
			"dataSrc": ""
		},
		"columns": [

			{ "data": "id_zonafibra" },
			{ "data": "nombre_zonafibra" },
			{ "data": "botes_zonafibra" },
			{ "data": "puertos_zonafibra" },
			{ "data": "equipo_zonafibra" },
			{ "data": "ip_zonafibra" },

			{
				"defaultContent":
					"<div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnEditar' data-toggle='modal' title='Eliminar antena'><i class='fas fa-thin fa-pen ml-2'></i></button></div><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar' title='Eliminar antena'><i class='fa fa-trash ml-2'></i></button></div></div>"
			}
		],
		lengthMenu: [50, 75, 100],
		language: {
			url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-MX.json',
		},
		orderCellsTop: true,
		fixedHeader: true
	});

	//Creamos  una fila en el head de la tabla y lo clonamos para cada columna
	$('#dataTable thead tr').clone(true).appendTo('#dataTable thead');

	$('#dataTable thead tr:eq(1) th').each(function (i) {
		var title = $(this).text();
		if (title == 'ID' || title == 'Acciones') {
			$(this).html('<h2 style="color:blank;"><H2/>');
		} else {
			$(this).html('<input class= "col-md-12" type= "text" placeholder= "Buscar..." />');
			$('input', this).on('keyup change', function () {
				if (table.column(i).search() !== this.value) {
					table
						.column(i)
						.search(this.value)
						.draw();
				}
			})
		}
	});

	//Editar
	$(document).on("click", ".btnEditar", function () {
		fila = $(this).closest("tr");
		id_zonafibra = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
		nombre_zonafibra = fila.find('td:eq(1)').text();
		botes_zonafibra = fila.find('td:eq(2)').text();
		puertos_zonafibra = fila.find('td:eq(3)').text();
		equipo_zonafibra = fila.find('td:eq(4)').text();
		ip_zonafibra = fila.find('td:eq(5)').text();
		$("#editar_id_zonafibra").val(id_zonafibra);
		$("#editar_nombre_zonafibra").val(nombre_zonafibra);
		$("#editar_botes_zonafibra").val(botes_zonafibra);
		$("#editar_puertos_zonafibra").val(puertos_zonafibra);
		$("#editar_equipo_zonafibra").val(equipo_zonafibra);
		$("#editar_ip_zonafibra").val(ip_zonafibra);
		$('#modal_editar_olt').modal('show');

	});

	//Borrar
	$(document).on("click", ".btnBorrar", function () {
		fila = $(this);
		user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
		var y = confirm('Estás seguro que deseas eliminar la OLT');
		if (y) {
			window.location.href = "/Sistema/Aguascalientes/incluides/base_datos/eliminar/eliminar_olt.php?id=" + user_id;
		}

	});
})
