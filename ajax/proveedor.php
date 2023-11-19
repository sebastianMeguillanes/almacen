<?php
require_once "../model/Proveedor.php";

$proveedor = new Proveedor();

$idproveedor = isset($_POST["idproveedor"]) ? $_POST["idproveedor"] : "";
$nombre = isset($_POST["nombre"]) ? mb_strtoupper($_POST["nombre"]) : "";
$correo = isset($_POST["correo"]) ? mb_strtoupper($_POST["correo"]) : "";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $proveedor->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['nombreproveedor'],
                "1" => $reg['correoproveedor'],
                "2" => $reg['telefonoproveedor'],
                "3" => '<button class="btn btn-danger" onclick="eliminar(' . $reg['idproveedor'] . ')">X</button>' .
                    '<button class="btn btn-warning" onclick="mostrar(' . $reg['idproveedor'] . ')">E</button>'
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
        if ($idproveedor === "") {
            $rspta = $proveedor->insertar($nombre, $correo, $telefono);
            echo $rspta ? "1:El Proveedor fue registrado" : "0:El Proveedor no fue registrado";
        } else {
            $rspta = $proveedor->editar($idproveedor, $nombre, $correo, $telefono);
            echo $rspta ? "1:El Proveedor fue actualizado" : "0:El Proveedor no fue actualizado";
        }
        break;
    case '2':
        $rspta = $proveedor->mostrar($idproveedor);
        $data = mysqli_fetch_assoc($rspta);
        echo json_encode($data);
        break;
    case '3':
        $rspta = $proveedor->eliminar($idproveedor);
        echo $rspta ? "1:El Proveedor fue eliminado" : "0:El Proveedor no fue eliminado";
        break;
    case '4':
        $rspta = $proveedor->listarSelect();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idproveedor'],
                "1" => $reg['nombreproveedor']
            );
        }
        echo json_encode($data);
        break;
}
?>
