var tabla;

function init()
{
	mostrarform(true);
	limpiarCampos();
	listar();
}

function registrar()
{
	mostrarform(false);
}


function guardar()
{
    $.ajax({
		url: "../ajax/proveedor.php?op=1",
	    type: "POST",
	    data: 
        {
			idproveedor: $("#id").val(),
            nombre: $("#nombre").val(),
            correo: $("#correo").val(),
            telefono: $("#telefono").val()
        },
	    success: function(datos)
	    {    
			
			mensaje=datos.split(":");
			if(mensaje[0]=="1"){               
			Swal.fire(
				'Mensaje de Confirmación',
				mensaje[1],
				'success'

				);
				limpiarCampos();
				mostrarform(true);
				tabla.ajax.reload();
			}
			else{
				Swal.fire({
					type: 'error',
					title: 'Error',
					text: mensaje[1],
					footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
				});
			}

	    },
		error: function()
		{
			console.log("Error");
		}

	});
	
}

function limpiarCampos()
{
	$("#id").val(""),
	$("#nombre").val(""),
	$("#correo").val(""),
    $("#telefono").val("")
}

function listar(){
	tabla=$('#tabla').DataTable(
        {
            "lengthMenu": [ 10, 25, 50, 75, 100 ],//mostramos el menú de registros a revisar
            "Processing": true,//Activamos el procesamiento del datatables
            "ServerSide": true,//Paginación y filtrado realizados por el servidor
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "ajax":
                    {
                        url: '../ajax/proveedor.php?op=0',
                        type : "GET",
                        dataType : "json",						
                        error: function(e){
                            console.log(e.responseText);	
                        }
                    },
            "Destroy": true,
            "iDisplayLength": 5,//Paginación
            "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
        });
}

function eliminar(id)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea eliminar al proveedor?",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancelar',
		confirmButtonText: 'Eliminar'
	}).then((result) => {
		if (result.value)
		{
			$.ajax({
			url: "../ajax/proveedor.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idproveedor: id
			},
			success: function()
			{    
				mensaje=e.split(":");
					if(mensaje[0]=="1"){  
						swal.fire(
							'Mensaje de Confirmación',
							mensaje[1],
							'success'
						);  
						tabla.ajax.reload();
					}	
					else{
						Swal.fire({
							type: 'error',
							title: 'Error',
							text: mensaje[1],
							footer: 'Verifique la información de Registro, en especial que la información no fué ingresada previamente a la Base de Datos.'
						});
					}
			},
			error: function()
			{
				tabla.ajax.reload();
			}
	
		});}
	});
	
}


function mostrar(id)
{
	mostrarform(false);
	$.ajax({
		url: "../ajax/proveedor.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idproveedor: id
        },
	    success: function(datos)
	    {    
			$("#id").val(datos["idproveedor"]),
			$("#nombre").val(datos["nombreproveedor"]),
			$("#correo").val(datos["correoproveedor"]),
    		$("#telefono").val(datos["telefonoproveedor"])
	    },
		error: function()
		{
			console.log("Error");
		}

	});
}

function mostrarform(bandera)
{
	if(bandera)
	{
		$("#creacion").show();
		$("#tablaListada").show();
		$("#registroProveedor").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroProveedor").show();
	}
}

init();
