<?php
require_once "../model/Almacen.php";

$almacen=new Almacen();


$idalmacen=isset($_POST["idalmacen"])? $_POST["idalmacen"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";
$locacion=isset($_POST["locacion"])? mb_strtoupper($_POST["locacion"]):"";




switch($_GET["op"])
{
    case '0':
		$rspta=$almacen->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idalmacen'],
                "1"=>$reg['nombre'],
                "2"=>$reg['ubicacion']
            );
		}
 		echo json_encode($data);

	break;
    case '1':
        if ($idalmacen==="")
        {
            $rspta=$almacen->insertar($nombre, $locacion);
		    echo $rspta ? "1:El Almacen fué registrado" : "0:El Almacen no fué registrado";
        }
        else
        {
            $rspta=$almacen->editar($idalmacen, $nombre, $locacion);
		    echo $rspta ? "1:El Almacen fué actualizado" : "0:El Almacen no fué actualizado";
        }
    break;
    case '2':
        $rspta=pg_fetch_assoc($almacen->mostrar($idalmacen));
 		echo json_encode($rspta);
    break;
    case '3':
        $rspta=$almacen->eliminar($idalmacen);
        echo $rspta ? "1:El Almacen fué eliminado" : "0:El Almacen no fué eliminado";
    break;

    case '4':
		$rspta=$almacen->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idalmacen'],
                "1"=>$reg['nombre'],
            );
		}
 		echo json_encode($data);
    break;

}