<?php
require_once "../model/rol.php";

$rol = new rol();

$idrol = isset($_POST["idrol"]) ? $_POST["idrol"] : "";
$nombrerol = isset($_POST["nombrerol"]) ? mb_strtoupper($_POST["nombrerol"]) : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $rol->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idrol'],
                "1" => $reg['nombrerol']
            );
        }
        echo json_encode($data);
        break;

    case '1':
        if ($idrol === "") {
            $rspta = $rol->insertar($nombrerol);
            echo $rspta ? "1:El rol fue registrado" : "0:El rol no fue registrado";
        } else {
            $rspta = $rol->editar($idrol, $nombrerol);
            echo $rspta ? "1:El Rol fue actualizado" : "0:El Rol no fue actualizado";
        }
        break;

    case '2':
        $rspta = mysqli_fetch_assoc($rol->mostrar($idrol));
        echo json_encode($rspta);
        break;

    case '3':
        $rspta = $rol->eliminar($idrol);
        echo $rspta ? "1:El Rol fue eliminado" : "0:El Rol no fue eliminado";
        break;
}
?>
