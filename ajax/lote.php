<?php
require_once "../model/lote.php";

$lote=new lote();


$idlote=isset($_POST["idlote"])? $_POST["idlote"]:"";
$fecha=isset($_POST["fecha"])? mb_strtoupper($_POST["fecha"]):"";
$idproveedor=isset($_POST["idproveedor"])? mb_strtoupper($_POST["idproveedor"]):"";




switch($_GET["op"])
{
    case '0':
        
		$rspta=$lote->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idlote'],
                "1"=>$reg['fecha'],
                "2"=>$reg['nombreproveedor']
            );
		}
 		echo json_encode($data);

	break;
    case '1':
        if (/*$lote===""*/ !is_numeric($idlote))
        {
            $rspta=$lote->insertar($fecha,$idproveedor);
		    echo $rspta ? "1:El lote fué registrado" : "0:El lote no fué registrado";
        }
        else
        {
            $rspta=$lote->editar($idlote,$fecha,$idproveedor);
		    echo $rspta ? "1:El lote fué actualizado" : "0:El lote no fué actualizado";
        }
    break;
    case '2':
        $rspta=pg_fetch_assoc($lote->mostrar($idlote));
 		echo json_encode($rspta);
    break;
    case '3':
        $rspta=$lote->eliminar($idlote);
        echo $rspta ? "1:El lote fué eliminado" : "0:El lote no fué eliminado";
    break;
}
