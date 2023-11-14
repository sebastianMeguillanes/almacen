var tabla;

function init()
{
	mostrarform(true);
	listar();
	limpiarCampos();
	listarSelect();
	document.getElementById("ingresosalida").selectedIndex = 0;
}

function registrar()
{
	mostrarform(false);
}

function limpiarCampos()
{
	$("#id").val("");
	$("#cantidad").val("");
	document.getElementById("ingresosalida").selectedIndex = 0;
	$("#fecha").val("");
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
		url: "../ajax/utilitario.php?op=2",
	    type: "POST",
		dataType: "JSON",
	    data: 
        {
            idutilitario: id
        },
	    success: function(datos)
	    {  		
			$("#id").val(id);
			$("#cantidad").val(datos["cantidad"]);
			filtrarSelect("idobjeto",datos["idobjeto"]);
			filtrarSelect("ingresosalida",datos["ingresosalida"]);
			$("#fecha").val(datos["fecha"]);
	    },
		error: function()
		{
			console.log("Error");
		}

	});
}

function eliminar(id)
{
	swal.fire({
		title: 'Mensaje de Confirmación',
		text: "¿Desea eliminar el utilitario?",
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
			url: "../ajax/utilitario.php?op=3",
			type: "POST",
			dataType: "JSON",
			data: 
			{
				idutilitario: id
			},
			success: function()
			{    
				tabla.ajax.reload();
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
		url: "../ajax/utilitario.php?op=1",
	    type: "POST",
	    data: 
        {
			idutilitario: $("#id").val(),
            //nombre: $("#nombre").val(),
            cantidad: $("#cantidad").val(),
            //contable: $("#contable").val(),
            ingresosalida: $("#ingresosalida").val(),
            fecha: $("#fecha").val(),
			idobjeto: $("#idobjeto").val()
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
			/*
            limpiarCampos();
			tabla.ajax.reload();
			*/
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
                        url: '../ajax/utilitario.php?op=0',
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

function listarSelect()
{
	let select = document.getElementById("idobjeto");
	$.ajax({
		url: "../ajax/objeto.php?op=0",
	    type: "POST",
		dataType: "JSON",
	    success: function(datos)
	    {    
			let text = "";
            datos.forEach(myFunction);
			function myFunction(item) 
            {
				text +=' <option value="'+item[0]+'">'+item[1]+'</option>'
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
		$("#registroProveedor").hide();
	}else
	{
		$("#creacion").hide();
		$("#tablaListada").hide();
		$("#registroProveedor").show();
	}
}

init();