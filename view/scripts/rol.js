
function init()
{
	listar();
	$("#formulario").on("submit",function(e)
	{
		guardar(e);	
	});
	mostrarform(true);
	limpiarCampos();

}

function registrar()
{
	mostrarform(false);
}

function guardar()
{
    $.ajax({
		url: "../ajax/rol.php?op=1",
	    type: "POST",
	    data: 
        {
			idrol: $("#id").val(),
            nombrerol: $("#nombrerol").val()
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
	$("#nombrerol").val("")

}

function listar(){
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/rol.php?op=0",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {    
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {
				
				text +=' <tr class="odd"> ' +
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
		text: "¿Desea eliminar el rol?",
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
			url: "../ajax/rol.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idrol: id
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
		url: "../ajax/rol.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idrol: id
        },
	    success: function(datos)
	    {    
			$("#id").val(datos["idrol"]),
			$("#nombrerol").val(datos["nombrerol"])

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
		$("#registroLote").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroLote").show();
	}
}
init();