<?php
require_once(__DIR__ . '/../config/Conexion.php');


Class Usuario
{
    public function listar()
	{
		$sql="SELECT idpersona,nombrepersona,correopersona,telefonopersona,cipersona 
		FROM persona WHERE borrado='N';";
		return ejecutarConsulta($sql);		
	}

	//$nombre, $correo, $telefono, $ci, $rol, $usuario, $contrasenia
    public function insertar($nombre, $correo, $telefono, $ci, $rol, $usuariox, $contrasenia)
	{
		$sql="INSERT INTO persona (nombrepersona,telefonopersona,cipersona,correopersona,fecha_reg,borrado)
		VALUES ('$nombre', '$telefono','$ci','$correo',CURRENT_TIMESTAMP,'N') RETURNING idpersona;";
		$idpersona = ejecutarConsulta_retornarID($sql);

		$sqlx="INSERT INTO usuario (usuario,contrasenia,idrol,idpersona,fecha_reg,borrado)
		VALUES ('$usuariox', '$contrasenia','$rol','$idpersona',CURRENT_TIMESTAMP,'N');";
		return ejecutarConsulta($sqlx);
	}

	public function editar($idusuario,$nombre, $correo, $telefono, $ci, $rol, $usuariox, $contrasenia)
	{	
		$sql="UPDATE persona
		SET nombrepersona ='$nombre', correopersona ='$correo',telefonopersona='$telefono',cipersona='$ci'
		WHERE idpersona = '$idusuario'";
		ejecutarConsulta($sql);
		
		$sql="UPDATE usuario
		SET usuario ='$usuariox',contrasenia ='$contrasenia',idrol='$rol'
		WHERE idusuario = '$idusuario'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idusuario)
	{
		$sql="SELECT f.nombrepersona,f.correopersona,f.telefonopersona,f.cipersona,u.usuario,u.contrasenia 
		FROM persona f INNER JOIN usuario u on u.idpersona = f.idpersona AND f.idpersona = $idusuario;";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idusuario)
	{
		$sql="UPDATE persona
		SET borrado = 'S'
		WHERE idpersona = '$idusuario'";
		ejecutarConsulta($sql);
		$sqlx="UPDATE usuario
		SET borrado = 'S'
		WHERE idpersona = '$idusuario'";
		return ejecutarConsulta($sqlx);
	}

	public function verificar($login, $clave)
	{
		$sql="SELECT u.idusuario,f.nombrepersona 
		FROM persona f INNER JOIN usuario u on u.idpersona = f.idpersona 
		AND u.usuario='$login' AND u.contrasenia='$clave';";
		
		return ejecutarConsulta($sql);
	}
}
    

?>