<?php
require_once "../model/Objeto.php";

$objeto=new Objeto();


$idobjeto=isset($_POST["idobjeto"])? $_POST["idobjeto"]:"";
$nombre=isset($_POST["nombre"])? mb_strtoupper($_POST["nombre"]):"";
$unidad=isset($_POST["unidad"])? mb_strtoupper($_POST["unidad"]):"";




switch($_GET["op"])
{
    case '0':
		$rspta=$objeto->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idobjeto'],
                "1"=>$reg['nombre'],
                "2"=>$reg['unidad']
            );
		}
 		echo json_encode($data);

	break;
    case '1':
        if ($idobjeto==="")
        {
            $rspta=$objeto->insertar($nombre, $unidad);
		    echo $rspta ? "1:El Objeto fué registrado" : "0:El Objeto no fué registrado";
        }
        else
        {
            $rspta=$objeto->editar($idobjeto, $nombre, $unidad);
		    echo $rspta ? "1:El Objeto fué actualizado" : "0:El Objeto no fué actualizado";
        }
    break;
    case '2':
        $rspta=pg_fetch_assoc($objeto->mostrar($idobjeto));
 		echo json_encode($rspta);
    break;
    case '3':
        $rspta=$objeto->eliminar($idobjeto);
        echo $rspta ? "1:El Objeto fué eliminado" : "0:El Objeto no fué eliminado";
    break;
}