$(document).ready(function () {
	console.log("entro")
	var table = $('#dataTable').DataTable({
		"ajax": {
			"url": "../../../base_datos/ajax/tablas/consulta_mk.php",
			"method": 'POST', //usamos el metodo POST
			"dataSrc": ""
		},
		"columns": [

			{ "data": "id_mk" },
			{"data": "ip_mk"},			
			{ "data": "nombre_mk" },
			{ "data": "user_mk" },
			{ "data": "pass_mk" },
			{ "data": "zona_mk", 
			"mRender": function ( data, type, full ) {
				if (data == 1) {
				return "Cede";
				}
			}},

			{
				"defaultContent":
				"<div class='text-center'><div class='btn-group'><button class='btn btn-sucess btn-sm btnEditar' data-toggle='modal' title='Editar Mk'><i class='fas fa-thin fa-pen ml-2'></i></button></div><div class='btn-group'><button class='btn btn-sucess btn-sm btnBorrar' title='Eliminar Mk'><i class='fa fa-trash ml-2'></i></button></div></div>"
			}
		],
		order: [2, 'asc'],
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
		id_mk = parseInt(fila.find('td:eq(0)').text()); //capturo el ID               
		ip_mk = fila.find('td:eq(1)').text();
		nombre_mk = fila.find('td:eq(2)').text();
		user_mk = fila.find('td:eq(3)').text();
		pass_mk = fila.find('td:eq(4)').text();
		zona_mk = fila.find('td:eq(5)').text();
		$("#editar_id_mk").val(id_mk);
		$("#editar_ip_mk").val(ip_mk);
		$("#editar_nombre_mk").val(nombre_mk);
		$("#editar_user_mk").val(user_mk);
		$("#editar_pass_mk").val(pass_mk);
		$("#editar_zona_mk").val(zona_mk);
		$('#modal_editar_mk').modal('show');

	});

	//Borrar
	$(document).on("click", ".btnBorrar", function () {
		fila = $(this);
		user_id = parseInt($(this).closest('tr').find('td:eq(0)').text());
		var y = confirm('Estás seguro que deseas eliminar la OLT');
		if (y) {
			window.location.href = "/Sistema/Aguascalientes/incluides/base_datos/eliminar/eliminar_mk.php?id=" + user_id;
		}

	});
})
