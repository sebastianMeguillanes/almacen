
var tabla;

function init()
{
	mostrarform(true);
	listar();
	limpiarCampos();
}

function registrar()
{
	mostrarform(false);
}




function limpiarCampos()
{
	$("#id").val("");
	$("#nombre").val("");
	$("#correo").val("");
	$("#telefono").val("");
	$("#ci").val("");
	$("#usuario").val("");
	$("#contrasenia").val("");
}

function mostrar(id)
{
	mostrarform(false);
	$.ajax({
		url: "../ajax/usuario.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idusuario: id
        },
	    success: function(datos)
	    {    
			$("#id").val(id);
			$("#nombre").val(datos["nombrepersona"]);
			$("#correo").val(datos["correopersona"]);
			$("#telefono").val(datos["telefonopersona"]);
			$("#ci").val(datos["cipersona"]);
			$("#usuario").val(datos["usuario"]);
			$("#contrasenia").val(datos["contrasenia"]);	
	    },
		error: function()
		{
			console.log("Error");
		},

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
			url: "../ajax/usuario.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idusuario: id
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

function guardar()
{
    $.ajax({
		url: "../ajax/usuario.php?op=1",
	    type: "POST",
	    data: 
        {
			idusuario: $("#id").val(),
            nombre: $("#nombre").val(),
            correo: $("#correo").val(),
            telefono: $("#telefono").val(),
            ci: $("#ci").val(),
            rol: $("#rolSeleccionado").val(),
			usuario: $("#usuario").val(),
			contrasenia: $("#contrasenia").val(),
        },
	    success: function(datos)
	    {    
            limpiarCampos();
			tabla.ajax.reload();
			mostrarform(true);
	    },
		error: function()
		{
			console.log("Error");
		}

	});
}

function listar()
{
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
                        url: '../ajax/usuario.php?op=0',
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
	/*
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/usuario.php?op=0",
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
				   '  		<td>'+item[4]+'</td>' +
				   '  		<td>' +
				   '  			<button class="btn btn-danger" onclick="eliminar('+item[0]+')">X</button>'+
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
	*/
}


function mostrarform(bandera)
{
	if(bandera)
	{
		$("#creacion").show();
		$("#tablaListada").show();
		$("#registroUsuario").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroUsuario").show();
	}
}


init();
