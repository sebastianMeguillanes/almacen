
function init()
{
	mostrarform(true);
	listar();
	listarCategoria();
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
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroProveedor").show();
	}
}


function guardar(){
	$.ajax({
		url: "../ajax/articulo.php?op=1",
	    type: "POST",
	    data: 
        {	
			idArticulo: $("#idArticulo").val(),
            nombreArticulo: $("#nombreArticulo").val(),
			codigoBarra: $("#codigoBarra").val(),
			articuloStock: $("#articuloStock").val(),
			categoria: $("#categoria").val()
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
			/*   
			limpiarCampos();
			listar();
			*/
	    },
		error: function()
		{
			console.log("Error ayuda luis");
		}
	});
}
function limpiarCampos()
{
	$("#idArticulo").val("");
	$("#codigoBarra").val("");
	$("#nombreArticulo").val("");
	$("#articuloStock").val("");
}
function listar(){
	let tbody = document.getElementById("contenidoTabla");
	$.ajax({
		url: "../ajax/articulo.php?op=0",
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
				   '  		<td>'+item[2]+'</td>' +
				   '  		<td>'+item[3]+'</td>' +
				   '  		<td>'+item[4]+'</td>' +
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
			alerta("ayuda");
		}

	});
}


function listarCategoria()
{
    let categoriaSelect = document.getElementById("categoria");
	$.ajax({
		url: "../ajax/categoria.php?op=4",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {	
				text +='<option value="'+item[0]+'">'+item[1]+'</option>'
			}
			categoriaSelect.innerHTML = text;
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
		text: "¿Desea eliminar el articulo?",
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
			url: "../ajax/articulo.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idArticulo: id
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
		url: "../ajax/articulo.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idArticulo: id
        },
	    success: function(datos)
	    {  
			console.log(datos);  
			$("#idArticulo").val(datos["idarticulo"]),
			$("#codigoBarra").val(datos["codigobarra"]),
			$("#nombreArticulo").val(datos["nombrearticulo"]),
			$("#articuloStock").val(datos["articulostock"]),
			filtrarSelect("categoria",datos["idcategoria"])
		
	    },
		error: function()
		{
			console.log("Error");
		}

	});
}

init();