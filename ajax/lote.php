<?php
require_once "../model/lote.php";

$lote = new lote();

$idlote = isset($_POST["idlote"]) ? $_POST["idlote"] : "";
$fecha = isset($_POST["fecha"]) ? mb_strtoupper($_POST["fecha"]) : "";
$idproveedor = isset($_POST["idproveedor"]) ? $_POST["idproveedor"] : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $lote->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idlote'],
                "1" => $reg['fecha'],
                "2" => $reg['nombreproveedor']
            );
        }
        echo json_encode($data);
        break;

    case '1':
        if (!is_numeric($idlote)) {
            $rspta = $lote->insertar($fecha, $idproveedor);
            echo $rspta ? "1:El lote fue registrado" : "0:El lote no fue registrado";
        } else {
            $rspta = $lote->editar($idlote, $fecha, $idproveedor);
            echo $rspta ? "1:El lote fue actualizado" : "0:El lote no fue actualizado";
        }
        break;

    case '2':
        $rspta = mysqli_fetch_assoc($lote->mostrar($idlote));
        echo json_encode($rspta);
        break;

    case '3':
        $rspta = $lote->eliminar($idlote);
        echo $rspta ? "1:El lote fue eliminado" : "0:El lote no fue eliminado";
        break;
}
?>
