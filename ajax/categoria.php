<?php
require_once "../model/Categoria.php";

$categoria = new Categoria();

$idcategoria = isset($_POST["idcategoria"]) ? $_POST["idcategoria"] : "";
$nombrecategoria = isset($_POST["nombrecategoria"]) ? mb_strtoupper($_POST["nombrecategoria"]) : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $categoria->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idcategoria'],
                "1" => $reg['nombrecategoria']
            );
        }
        echo json_encode($data);
        break;
    case '1':
        if (!is_numeric($idcategoria)) {
            $rspta = $categoria->insertar($nombrecategoria);
            echo $rspta ? "1:La categoría fue registrada" : "0:La categoría no fue registrada";
        } else {
            $rspta = $categoria->editar($idcategoria, $nombrecategoria);
            echo $rspta ? "1:La categoría fue actualizada" : "0:La categoría no fue actualizada";
        }
        break;
    case '2':
        $rspta = $categoria->mostrar($idcategoria);
        $data = mysqli_fetch_assoc($rspta);
        echo json_encode($data);
        break;
    case '3':
        $rspta = $categoria->eliminar($idcategoria);
        echo $rspta ? "1:La categoría fue eliminada" : "0:La categoría no fue eliminada";
        break;
    case '4':
        $rspta = $categoria->listarSelect();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idcategoria'],
                "1" => $reg['nombrecategoria']
            );
        }
        echo json_encode($data);
        break;
}
?>
