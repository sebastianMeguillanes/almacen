
function init()
{
	listarselect();
	mostrarform(true);
	listar();
	limpiarCampos();
}

function registrar()
{
	mostrarform(false);
}


function filtrarSelect(identificador,valor)
{
    var elemento = document.getElementById(identificador);
    
    for (var i = 0; i < elemento.length; i++) 
    {
        if (elemento.options[i].value == valor)
        {
          var posicion = i;
          break;
        }
    }
    document.getElementById(identificador).selectedIndex = posicion;
}

function guardar()
{
    $.ajax({
		url: "../ajax/asistencia.php?op=1",
	    type: "POST",
	    data: 
        {
			idasistencia: $("#id").val(),
            fecha: $("#fecha").val(),
            ingreso: $("#ingreso").val(),
            idusuario: $("#contenidoSelect").val()
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
	$("#id").val("");
	$("#fecha").val("");
    document.getElementById("ingreso").selectedIndex = 0;
    $("#idusuario").val("");

}




function listarselect(){
	let select = document.getElementById("contenidoSelect");
	$.ajax({
		url: "../ajax/asistencia.php?op=4",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {    
            
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {

				text += 
				 '<option value="'+item[0]+'">'+item[1]+'</option>'



				/*
				text +=' <tr class="odd"> ' +
                   '  		<td>'+item[1]+'</td>' +
                   '  		<td>'+item[2]+'</td>' +
				   '  		<td>'+item[3]+'</td>' +
				   '  		<td>' +
				   '  			<button class="btn btn-danger" onclick="eliminar('+item[0]+')">X</i></button>'+
				   '            <button class="btn btn-warning" onclick="mostrar('+item[0]+')">E</button>'+
				   '        </td>'+
				   ' 	</tr>' */
			}
			select.innerHTML = text;
	    },
		error: function()
		{
			console.log("Error no carga");
		}

	});
}


function listar(){
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/asistencia.php?op=0",
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
                   '  		<td>'+item[2]+'</td>' +
				   '  		<td>'+item[3]+'</td>' +
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
		text: "¿Desea eliminar el lote?",
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
			url: "../ajax/asistencia.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idasistencia: id
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
		url: "../ajax/asistencia.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idasistencia: id
        },
	    success: function(datos)
	    {    
			$("#id").val(datos["idasistencia"]),
			$("#fecha").val(datos["fecha"]),
			filtrarSelect("ingreso",datos["ingreso"]),//$("#ingreso").val(datos["ingreso"]),
            filtrarSelect("contenidoSelect",datos["idusuario"])

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