
function init()
{
	/*
	$("#formulario").on("submit",function()
	{
		guardar();	
	});*/
	listar();
	mostrarform(true);
}

function registrar()
{
	mostrarform(false);
}
//proveedor


function guardar(){
	//alert("nice luis");
	$.ajax({
		url: "../ajax/categoria.php?op=1",
	    type: "POST",
	    data: 
        {	
			idcategoria: $("#idcategoria").val(),
            nombrecategoria: $("#nombrecategoria").val()
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
			console.log("Error ayuda luis");
		}

	});
}

function limpiarCampos()
{
	
	$("#nombrecategoria").val("");
	$("#idcategoria").val("");

}

function listar(){
	//alert("Hola, mundo! listar sirve");
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/categoria.php?op=0",
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
		url: "../ajax/categoria.php?op=3",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idcategoria: id
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
		url: "../ajax/categoria.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idcategoria: id
        },
	    success: function(datos)
	    {    
			$("#idcategoria").val(datos["idcategoria"]),
			$("#nombrecategoria").val(datos["nombrecategoria"])
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
		$("#registroCategoria").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroCategoria").show();
	}
}

init();