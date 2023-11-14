var tabla;
function init()
{
    listar();
    listarAlmacen();
    listarArticulo();
	mostrarform(true);
	limpiarCampos();
}

function registrar()
{
	mostrarform(false);
}

function listarAlmacen()
{
    let articuloSelect = document.getElementById("almacen");
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

function listarArticulo()
{
    let almacenSelect = document.getElementById("articulo");
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
                        url: '../ajax/existencia.php?op=0',
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

function mostrar(idalmacen, idarticulo)
{
	mostrarform(false);
    $.ajax({
		url: "../ajax/existencia.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idalmacen: idalmacen,
            idarticulo: idarticulo
        },
	    success: function(datos)
	    {    
            $("#bandera").val(datos["bandera"]),
            $("#cantidad").val(datos["cantidad"]),
            filtrarSelect("almacen",datos["idalmacen"]),
            filtrarSelect("articulo",datos["idarticulo"])
	    },
		error: function()
		{
			console.log("Error");
		}

	});
}

function guardar()
{
    $.ajax({
		url: "../ajax/existencia.php?op=1",
	    type: "POST",
	    data: 
        {
			bandera: $("#bandera").val(),
            idalmacen: $("#almacen").val(),
            idarticulo: $("#articulo").val(),
            cantidad: $("#cantidad").val()
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

function retirar()
{
    $.ajax({
		url: "../ajax/existencia.php?op=5",
	    type: "POST",
	    data: 
        {
            idalmacen: $("#almacen").val(),
            idarticulo: $("#articulo").val(),
            cantidad: $("#cantidad").val()
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
    $("#bandera").val("");
    $("#cantidad").val("");
    document.getElementById("articulo").selectedIndex = 0;
    document.getElementById("almacen").selectedIndex = 0;
}


function mostrarform(bandera)
{
	if(bandera)
	{
		$("#creacion").show();
		$("#tablaListada").show();
		$("#registroExistencia").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroExistencia").show();
	}
}


init();