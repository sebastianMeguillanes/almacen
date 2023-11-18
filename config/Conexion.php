<?php

require_once "global.php";

$conexion = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME, DB_PORT);

if (!$conexion) {
    die("Error: No se pudo conectar a la base de datos. " . mysqli_connect_error());
}

if (!function_exists('ejecutarConsulta')) {
    function ejecutarConsulta($sql)
    {
        global $conexion;
        $query = mysqli_query($conexion, $sql);
        return $query;
    }

    function ejecutarConsultaSimpleFila($sql)
    {
        global $conexion;
        $query = mysqli_query($conexion, $sql);
        $row = mysqli_fetch_assoc($query);
        return $row;
    }

    function ejecutarConsulta_retornarID($sql)
    {
        global $conexion;
        $query = mysqli_query($conexion, $sql);
        $new_id = mysqli_insert_id($conexion);
        return $new_id;
    }

    function cerrar_conexion()
    {
        global $conexion;
        mysqli_close($conexion);
        return true;
    }
}
?>