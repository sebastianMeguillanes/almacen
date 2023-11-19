<?php
require_once "../model/Articulo.php";

$articulo = new Articulo();

$idArticulo = isset($_POST["idArticulo"]) ? $_POST["idArticulo"] : "";
$nombreArticulo = isset($_POST["nombreArticulo"]) ? mb_strtoupper($_POST["nombreArticulo"]) : "";
$codigoBarra = isset($_POST["codigoBarra"]) ? $_POST["codigoBarra"] : "";
$articuloStock = isset($_POST["articuloStock"]) ? mb_strtoupper($_POST["articuloStock"]) : "";
$categoria = isset($_POST["categoria"]) ? mb_strtoupper($_POST["categoria"]) : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $articulo->listar();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idarticulo'],
                "1" => $reg['nombrearticulo'],
                "2" => $reg['codigobarra'],
                "3" => $reg['articulostock'],
                "4" => $reg['nombrecategoria']
            );
        }
        echo json_encode($data);
        break;

    case '1':
        if (!is_numeric($idArticulo)) {
            $rspta = $articulo->insertar($nombreArticulo, $codigoBarra, $articuloStock, $categoria);
            echo $rspta ? "1:La categoría fue registrada" : "0:La categoría no fue registrada";
        } else {
            $rspta = $articulo->editar($idArticulo, $nombreArticulo, $codigoBarra, $articuloStock);
            echo $rspta ? "1:El artículo fue actualizado" : "0:El artículo no fue actualizado";
        }
        break;
    case '2':
        $rspta = $articulo->mostrar($idArticulo);
        $data = mysqli_fetch_assoc($rspta);
        echo json_encode($data);
        break;
    case '3':
        $rspta = $articulo->eliminar($idArticulo);
        echo $rspta ? "1:El Proveedor fue eliminado" : "0:El Proveedor no fue eliminado";
        break;

    case '4':
        $rspta = $articulo->listarSelect();
        $data = Array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['idarticulo'],
                "1" => $reg['nombrearticulo'],
            );
        }
        echo json_encode($data);
        break;
}
?>
