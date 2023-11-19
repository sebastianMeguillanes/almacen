<?php
require_once "../model/asistencia.php";

$asistencia = new asistencia();

$idasistencia = isset($_POST["idasistencia"]) ? $_POST["idasistencia"] : "";
$fecha = isset($_POST["fecha"]) ? mb_strtoupper($_POST["fecha"]) : "";
$ingreso = isset($_POST["ingreso"]) ? mb_strtoupper($_POST["ingreso"]) : "";
$idusuario = isset($_POST["idusuario"]) ? mb_strtoupper($_POST["idusuario"]) : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $asistencia->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $ingreso = $reg['ingreso'] == 'S' ? "INGRESO" : "SALIDA";
            $data[] = array(
                "0" => $reg['idasistencia'],
                "1" => $reg['fecha'],
                "2" => $ingreso,
                "3" => $reg['nombrepersona']
            );
        }
        echo json_encode($data);

        break;
    case '1':
        if (!is_numeric($idasistencia)) {
            $rspta = $asistencia->insertar($fecha, $ingreso, $idusuario);
            echo $rspta ? "1:La asistencia fue registrada" : "0:La asistencia no fue registrada";
        } else {
            $rspta = $asistencia->editar($idasistencia, $fecha, $ingreso, $idusuario);
            echo $rspta ? "1:La asistencia fue actualizada" : "0:La asistencia no fue actualizada";
        }
        break;
    case '2':
        $rspta = $asistencia->mostrar($idasistencia);
        $data = mysqli_fetch_assoc($rspta);
        echo json_encode($data);
        break;
    case '3':
        $rspta = $asistencia->eliminar($idasistencia);
        echo $rspta ? "1:La asistencia fue eliminada" : "0:La asistencia no fue eliminada";
        break;
    case '4':
        $rspta = $asistencia->listarselect();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idpersona'],
                "1" => $reg['nombrepersona']
            );
        }
        echo json_encode($data);

        break;
}
?>
