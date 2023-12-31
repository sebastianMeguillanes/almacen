<?php
session_start();
require_once "../model/Utilitario.php";
$utilitario = new Utilitario();

$idutilitario = isset($_POST["idutilitario"]) ? $_POST["idutilitario"] : "";
$cantidad = isset($_POST["cantidad"]) ? mb_strtoupper($_POST["cantidad"]) : "";
$ingresosalida = isset($_POST["ingresosalida"]) ? $_POST["ingresosalida"] : "";
$fecha = isset($_POST["fecha"]) ? $_POST["fecha"] : "";
$idobjeto = isset($_POST["idobjeto"]) ? mb_strtoupper($_POST["idobjeto"]) : "";
$idusuario = $_SESSION['idusuario'];

switch ($_GET["op"]) {
    case '0':
        $rspta = $utilitario->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['nombre'],
                "1" => $reg['cantidad'],
                "2" => $reg['ingresosalida'],
                "3" => $reg['fecha'],
                "4" => '<button class="btn btn-danger" onclick="eliminar(' . $reg['idutilitario'] . ')">X</button>' .
                    '<button class="btn btn-warning" onclick="mostrar(' . $reg['idutilitario'] . ')">E</button>'
            );
        }
        $results = array(
            "sEcho" => 1, //Información para el datatables
            "iTotalRecords" => count($data), //enviamos el total registros al datatable
            "iTotalDisplayRecords" => count($data), //enviamos el total registros a visualizar
            "aaData" => $data
        );
        echo json_encode($results);
        break;

    case '1':
        if (!is_numeric($idutilitario)) {
            $rspta = $utilitario->insertar($cantidad, $ingresosalida, $fecha, $idobjeto, $idusuario);
            echo $rspta ? "1:El Utilitario fue registrado" : "0:El Utilitario no fue registrado";
        } else {
            $rspta = $utilitario->editar($idutilitario, $cantidad, $ingresosalida, $fecha, $idobjeto);
            echo $rspta ? "1:El Utilitario fue actualizado" : "0:El Utilitario no fue actualizado";
        }
        break;

    case '2':
        $rspta = mysqli_fetch_assoc($utilitario->mostrar($idutilitario));
        echo json_encode($rspta);
        break;

    case '3':
        $rspta = $utilitario->eliminar($idutilitario);
        echo $rspta ? "1:El Utilitario fue eliminado" : "0:El Utilitario no fue eliminado";
        break;
}
?>
