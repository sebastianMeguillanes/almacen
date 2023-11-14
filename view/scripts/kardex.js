
function init()
{
	mostrarform(true);
	listar();
	listarArticulo();
	listarAlmacen();
}

function registrar()
{
	mostrarform(false);
}

function mostrarform(bandera)
{
	if(bandera)
	{
		$("#creacion").show();
		$("#tablaListada").show();
		$("#registroProveedor").hide();
	}
	else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroProveedor").show();
	}
}


function guardar(){
	$.ajax({
		url: "../ajax/kardex.php?op=1",
	    type: "POST",
	    data: 
        {
			idkardex: $("#idkardex").val(),
			idalmacen: $("#idalmacen").val(),
			idarticulo: $("#idarticulo").val(),
			cantidad: $("#cantidad").val(),
			accion: $("#accion").val(),
			fecha: $("#fecha").val() 
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
			/*limpiarCampos();
			listar();*/
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
    $("#idkardex").val("");
	document.getElementById("idalmacen").selectedIndex = 0;
    document.getElementById("idarticulo").selectedIndex = 0;
	$("#cantidad").val("");
	$("#accion").val("");
	$("#fecha").val("");
}

function listar(){
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/kardex.php?op=0",
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
				   ' 		<td>'+item[3]+'</td>' +
				   ' 		<td>'+item[4]+'</td>' +
				   ' 		<td>'+item[5]+'</td>' +
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
			alert("error");
			console.log("Error no carga");
		}

	});
}

function listarArticulo()
{
    let almacenSelect = document.getElementById("idarticulo");
	$.ajax({
		url: "../ajax/articulo.php?op=4",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {
            console.log(datos);
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {	
				text +='<option value="'+item[0]+'">'+item[1]+'</option>'
			}
			almacenSelect.innerHTML = text;
	    },
		error: function()
		{
			console.log("Error no carga");
		}

	});
}

function listarAlmacen()
{
    let articuloSelect = document.getElementById("idalmacen");
	$.ajax({
		url: "../ajax/almacen.php?op=4",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {
            console.log(datos);
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {	
				text +='<option value="'+item[0]+'">'+item[1]+'</option>'
			}
			articuloSelect.innerHTML = text;
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
		text: "¿Desea eliminar el registro?",
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
			url: "../ajax/kardex.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idkardex: id
			},
			success: function()
			{    
				listar();
			},
			error: function()
			{
				listar();
			}
		});}

	});
	
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


function mostrar(id)
{
	mostrarform(false);
	$.ajax({
		url: "../ajax/kardex.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idkardex: id
        },
	    success: function(datos)
	    {    
			$("#idkardex").val(datos["idkardex"]),
			filtrarSelect("idalmacen",datos["idalmacen"]),
			filtrarSelect("idarticulo",datos["idarticulo"]),
			$("#cantidad").val(datos["cantidad"]),
			$("#accion").val(datos["accion"]),
			$("#fecha").val(datos["fechakardex"])
	    },
		error: function()
		{
			console.log("Error");
		}

	});
}

init();