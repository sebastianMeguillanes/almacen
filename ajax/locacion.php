<?php
require_once "../model/Locacion.php";

$locacion=new Locacion();


$idlocacion=isset($_POST["idlocacion"])? $_POST["idlocacion"]:"";
$ubicacion=isset($_POST["ubicacion"])? mb_strtoupper($_POST["ubicacion"]):"";



switch($_GET["op"])
{
    case '0':
		$rspta=$locacion->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idlocacion'],
                "1"=>$reg['ubicacion']
            );
		}
 		echo json_encode($data);

	break;
    case '1':
        if (!is_numeric($idlocacion))
        {
            $rspta=$locacion->insertar($ubicacion);
		    echo $rspta ? "1:la locacion fué registrado" : "0:El locacion no fué registrado";
        }
        else
        {
            $rspta=$locacion->editar($idlocacion, $ubicacion);
		    echo $rspta ? "1:El Proveedor fué actualizado" : "0:El Proveedor no fué actualizado";
        }
    break;
    case '2':
        $rspta=pg_fetch_assoc($locacion->mostrar($idlocacion));
 		echo json_encode($rspta);
    break;
    case '3':
        $rspta=$locacion->eliminar($idlocacion);
        echo $rspta ? "1:El locacion fué eliminado" : "0:El locacion no fué eliminado";
    break;
}
