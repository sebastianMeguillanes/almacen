<?php
session_start();
require_once "../model/Existencia.php";
$existencia = new Existencia();

$bandera=isset($_POST["bandera"])? $_POST["bandera"]:"";
$idalmacen=isset($_POST["idalmacen"])? $_POST["idalmacen"]:"";
$idarticulo=isset($_POST["idarticulo"])? $_POST["idarticulo"]:"";
$cantidad=isset($_POST["cantidad"])? $_POST["cantidad"]:"";

switch($_GET["op"])
{
    case '0':
		$rspta=$existencia->listar();
 		$data= Array();

 		while ($reg = pg_fetch_assoc($rspta))
        {			
			$data[]=array(
                "0"=>$reg['nombre'],
                "1"=>$reg['nombrearticulo'],
                "2"=>$reg['cantidad'],
                "3"=>'<button class="btn btn-danger" onclick="eliminar('.$reg['idalmacen'].','.$reg['idarticulo'].')">X</button>'.
                    '<button class="btn btn-warning" onclick="mostrar('.$reg['idalmacen'].','.$reg['idarticulo'].')">E</button>'
                );
		}
        $results = array(
            "sEcho"=>1, //Información para el datatables
            "iTotalRecords"=>count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords"=>count($data), //enviamos el total registros a visualizar
            "aaData"=>$data);
        echo json_encode($results);
	break;

    case '1':
        if(!is_numeric($bandera))
        {
            $validacion=$existencia->comprueba_duplicados($idalmacen,$idarticulo);
            if($validacion==0)
            {
                $rspta=$existencia->insertar($idalmacen, $idarticulo, $cantidad);
		        echo $rspta ? "1:Existencia registrada correctamente" : "0:La Existencia no se pudo registrar";
            }
            else
            {
                $unidades=$existencia->obtenerCantidad($idalmacen,$idarticulo);
                $total = intval($unidades) + intval($cantidad);
                $rspta=$existencia->editar($idalmacen, $idarticulo, $total);
		        echo $rspta ? "1:Existencia actualizada" : "0:La Existencia no se pudo actualizar";
            }
        }
        else
        {
            $rspta=$existencia->editar($idalmacen, $idarticulo, $cantidad);
		    echo $rspta ? "1:Existencia actualizada" : "0:La Existencia no se pudo actualizar";
        } 
    break;

    case '2':
        $rspta=pg_fetch_assoc($existencia->mostrar($idalmacen, $idarticulo));
 		echo json_encode($rspta);
    break;

    case '5':
        $rspta = false;
        $unidades=$existencia->obtenerCantidad($idalmacen,$idarticulo);
        $total = intval($unidades) - intval($cantidad);
        if($total>=0)
        {
            $rspta=$existencia->editar($idalmacen, $idarticulo, $total);
        }
        echo $rspta ? "1:Existencia retirada exitosamente" : "0:La Existencia no se pudo retirar";
    break;
}