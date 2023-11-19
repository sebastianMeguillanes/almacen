<?php
require_once "../model/Almacen.php";

$almacen = new Almacen();

$idalmacen = isset($_POST["idalmacen"]) ? $_POST["idalmacen"] : "";
$nombre = isset($_POST["nombre"]) ? mb_strtoupper($_POST["nombre"]) : "";
$locacion = isset($_POST["locacion"]) ? mb_strtoupper($_POST["locacion"]) : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $almacen->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idalmacen'],
                "1" => $reg['nombre'],
                "2" => $reg['ubicacion']
            );
        }
        echo json_encode($data);

        break;
    case '1':
        if ($idalmacen === "") {
            $rspta = $almacen->insertar($nombre, $locacion);
            echo $rspta ? "1:El Almacen fue registrado" : "0:El Almacen no fue registrado";
        } else {
            $rspta = $almacen->editar($idalmacen, $nombre, $locacion);
            echo $rspta ? "1:El Almacen fue actualizado" : "0:El Almacen no fue actualizado";
        }
        break;
    case '2':
        $rspta = $almacen->mostrar($idalmacen);
        $data = mysqli_fetch_assoc($rspta);
        echo json_encode($data);
        break;
    case '3':
        $rspta = $almacen->eliminar($idalmacen);
        echo $rspta ? "1:El Almacen fue eliminado" : "0:El Almacen no fue eliminado";
        break;
    case '4':
        $rspta = $almacen->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idalmacen'],
                "1" => $reg['nombre'],
            );
        }
        echo json_encode($data);
        break;
}
?>
