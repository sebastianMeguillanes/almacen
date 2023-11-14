function init()
{
	listar();
	listarSelect();
	mostrarform(true);
	limpiarCampos();
	//$("#idlocacion").select2({placeholder: 'Seleciona una locacion'});
} 

function registrar()
{
	mostrarform(false);
}

function guardarAlmacen()
{
	
    $.ajax({
		url: "../ajax/almacen.php?op=1",
	    type: "POST",
	    data: 
        {
			idalmacen: $("#id").val(),
            nombre: $("#nombre").val(),
            locacion: $("#idlocacion").val()
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
			listar();
			mostrarform(true);
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
	$("#nombre").val("")
	
}

function listar(){
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/almacen.php?op=0",
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
			url: "../ajax/almacen.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idalmacen: id
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
		url: "../ajax/almacen.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idalmacen: id
        },
	    success: function(datos)
	    {    
			$("#id").val(datos["idalmacen"]),
			$("#nombre").val(datos["nombre"]),
			$("#idlocacion").val(datos["idlocacion"])
	    },
		error: function()
		{
			console.log("Error");
		}

	});
}

function listarSelect(){
	let select = document.getElementById("idlocacion");
	$.ajax({
		url: "../ajax/locacion.php?op=0",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {    
			console.log(datos);
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {
				text +=' <option value="'+item[0]+'">'+item[1]+'</option> '    
			}
			select.innerHTML = text;
	    },
		error: function()
		{
			console.log("Error no carga");
		}

	});
}

function mostrarform(bandera)
{
	if(bandera)
	{
		$("#creacion").show();
		$("#tablaListada").show();
		$("#registroAlmacen").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroAlmacen").show();
	}
}

init();