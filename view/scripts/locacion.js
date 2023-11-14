
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


function guardar(){
	$.ajax({
		url: "../ajax/locacion.php?op=1",
	    type: "POST",
	    data: 
        {	
			idlocacion: $("#idlocacion").val(),
            ubicacion: $("#ubicacion").val()
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
				listar();
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
			alert("error");
			console.log("Error ayuda luis");
		}

	});
}

function limpiarCampos()
{
	
	$("#idlocacion").val("");
	$("#ubicacion").val("");
}

function listar(){
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/locacion.php?op=0",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {  
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {
				
				text +=' <tr class="odd"> ' +
                   '  		<td>'+item[0]+'</td>' +
				   '  		<td>'+item[1]+'</td>' +
				   '  		<td>' +
				   '  			<button class="btn btn-danger" onclick="eliminar('+item[0]+')">X</i></button>'+
				   '            <button class="btn btn-warning" onclick="mostrar('+item[0]+')">E</button>'+
				   '        </td>'+
				   ' 	</tr>' 
			}
			tbody.innerHTML = text;
	    },
		error: function()
		{
			console.log("Error no carga");
		}

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
				url: "../ajax/locacion.php?op=3",
				type: "POST",
				dataType: "JSON",
				data: 
				{
					idlocacion: id
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
					listar();
				},
				error: function()
				{
					listar();
				}

	});}
});
	
}


function mostrar(id)
{
	mostrarform(false);
	$.ajax({
		url: "../ajax/locacion.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idlocacion: id
        },
	    success: function(datos)
	    {    
			$("#idlocacion").val(datos["idlocacion"]),
			$("#ubicacion").val(datos["ubicacion"])
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
		$("#registroLocacion").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroLocacion").show();
	}
}

init();