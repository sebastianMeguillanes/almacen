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

?>
