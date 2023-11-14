<?php
session_start();
require_once "../model/Kardex.php";

$kardex=new Kardex();


$idkardex=isset($_POST["idkardex"])? $_POST["idkardex"]:"";
$idalmacen=isset($_POST["idalmacen"])? $_POST["idalmacen"]:"";
$idarticulo=isset($_POST["idarticulo"])? $_POST["idarticulo"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";
$accion=isset($_POST["accion"])? mb_strtoupper($_POST["accion"]):"";
$fecha=isset($_POST["fecha"])? $_POST["fecha"]:"";

$idusuario = $_SESSION['idusuario'];



switch($_GET["op"])
{
    case '0':
		$rspta=$kardex->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['idkardex'],
                "1"=>$reg['nombre'],
                "2"=>$reg['nombrearticulo'],
                "3"=>$reg['cantidad'],
                "4"=>$reg['accion'],
                "5"=>$reg['fechakardex']
            );
		}
 		echo json_encode($data);

	break;
    case '1':
        if (!is_numeric($idkardex))
        {
            $rspta=$kardex->insertar($fecha,$accion,$idalmacen,$idusuario,$idarticulo,$cantidad);
		    echo $rspta ? "1:Registro guardado exitosamente" : "0:El Registro no se puede guardar";
        }
        else
        {
            $rspta=$kardex->editar($idkardex,$idalmacen,$idarticulo,$cantidad,$accion,$fecha,$idusuario);
		    echo $rspta ? "1:Registro Actualizado exitosamente" : "0:El registro no se pudo actualizar";
        }
    break;
    case '2':
        $rspta=pg_fetch_assoc($kardex->mostrar($idkardex));
 		echo json_encode($rspta);
    break;
    case '3':
        $rspta=$kardex->eliminar($idkardex);
        echo $rspta ? "1:El Proveedor fué eliminado" : "0:El Proveedor no fué eliminado";
    break;
}
