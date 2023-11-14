<?php
require_once "../model/Categoria.php";

$categoria=new Categoria();


$idcategoria=isset($_POST["idcategoria"])? $_POST["idcategoria"]:"";
$nombrecategoria=isset($_POST["nombrecategoria"])? mb_strtoupper($_POST["nombrecategoria"]):"";



switch($_GET["op"])
{
    case '0':
		$rspta=$categoria->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idcategoria'],
                "1"=>$reg['nombrecategoria']
            );
		}
 		echo json_encode($data);

	break;
    case '1':
        if (!is_numeric($idcategoria))
        {
            $rspta=$categoria->insertar($nombrecategoria);
		    echo $rspta ? "1:la categoria fué registrado" : "0:El Proveedor no fué registrado";
        }
        else
        {
            $rspta=$categoria->editar($idcategoria, $nombrecategoria);
		    echo $rspta ? "1:El Proveedor fué actualizado" : "0:El Proveedor no fué actualizado";
        }
    break;
    case '2':
        $rspta=pg_fetch_assoc($categoria->mostrar($idcategoria));
 		echo json_encode($rspta);
    break;
    case '3':
        $rspta=$categoria->eliminar($idcategoria);
        echo $rspta ? "1:El Proveedor fué eliminado" : "0:El Proveedor no fué eliminado";
    break;

    case '4':
		$rspta=$categoria->listarSelect();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idcategoria'],
                "1"=>$reg['nombrecategoria']
            );
		}
 		echo json_encode($data);

	break;
}
