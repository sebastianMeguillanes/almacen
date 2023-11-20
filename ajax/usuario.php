<?php
session_start();
require_once('../model/Usuario.php');
$usuario = new Usuario();

require_once "seguridad.php";
$seguridad = new seguridad();

$idusuario = isset($_POST["idusuario"]) ? $_POST["idusuario"] : "";
$nombre = isset($_POST["nombre"]) ? mb_strtoupper($_POST["nombre"]) : "";
$correo = isset($_POST["correo"]) ? mb_strtoupper($_POST["correo"]) : "";
$telefono = isset($_POST["telefono"]) ? $_POST["telefono"] : "";
$ci = isset($_POST["ci"]) ? $_POST["ci"] : "";
$rol = isset($_POST["rol"]) ? $_POST["rol"] : "";
$usuariox = isset($_POST["usuario"]) ? $_POST["usuario"] : "";
$contrasenia = isset($_POST["contrasenia"]) ? $_POST["contrasenia"] : "";

switch ($_GET["op"]) {
    case '0':
        $rspta = $usuario->listar();
        $data = array();

        while ($reg = mysqli_fetch_assoc($rspta)) {
            $data[] = array(
                "0" => $reg['nombrepersona'],
                "1" => $reg['correopersona'],
                "2" => $reg['telefonopersona'],
                "3" => $reg['cipersona'],
                "4" => '<button class="btn btn-danger" onclick="eliminar(' . $reg['idpersona'] . ')">X</button>' .
                    '<button class="btn btn-warning" onclick="mostrar(' . $reg['idpersona'] . ')">E</button>'
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
        $contraseniahash = $seguridad->stringEncryption('encrypt', $contrasenia);
        $usuariohash = $seguridad->stringEncryption('encrypt', $usuariox);
        if (!is_numeric($idusuario)) {
            $rspta = $usuario->insertar($nombre, $correo, $telefono, $ci, $rol, $usuariohash, $contraseniahash);
            echo $rspta ? "1:El Usuario fué registrado" : "0:El Usuario no fué registrado";
        } else {
            $rspta = $usuario->editar($idusuario, $nombre, $correo, $telefono, $ci, $rol, $usuariohash, $contraseniahash);
            echo $rspta ? "1:El Usuario fué actualizado" : "0:El Usuario no fué actualizado";
        }
        break;
    case '2':
        $rspta = mysqli_fetch_assoc($usuario->mostrar($idusuario));
        $rspta['usuario'] = $seguridad->stringEncryption('decrypt', $rspta['usuario']);
        $rspta['contrasenia'] = $seguridad->stringEncryption('decrypt', $rspta['contrasenia']);
        echo json_encode($rspta);
        break;
    case '3':
        $rspta = $usuario->eliminar($idusuario);
        echo $rspta ? "1:El Usuario fué eliminado" : "0:El Usuario no fué eliminado";
        break;
    case '5':
        $logina = $_POST['logina'];
        $clavea = $_POST['clavea'];

        $loginhash = $seguridad->stringEncryption('encrypt', $logina);
        $clavehash = $seguridad->stringEncryption('encrypt', $clavea);

        $rspta = $usuario->verificar($loginhash, $clavehash);
        $contador = 0;
        while ($fetch = mysqli_fetch_assoc($rspta)) {
            $contador += 1;
            $_SESSION['idusuario'] = $fetch['idusuario'];
            $_SESSION['nombrepersona'] = $fetch['nombrepersona'];
        }
        echo $contador;
        break;
    case '7':
        // Limpiamos las variables de sesión
        session_unset();
        // Destruìmos la sesión
        session_destroy();
        // Redireccionamos al login
        header("Location: ../index.php");
        break;
}
?>