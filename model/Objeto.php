<?php
require_once "../config/Conexion.php";

Class Objeto
{
    public function listar()
	{
		$sql="SELECT idobjeto, nombre, unidad FROM objeto WHERE borrado='N'";
		return ejecutarConsulta($sql);		
	}

	public function insertar($nombre,$unidad)
	{
		$sql="INSERT INTO objeto (nombre,unidad,fecha_reg,borrado,id_usuario)
		VALUES ('$nombre', '$unidad',NOW(),'N',NULL);";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idobjeto)
	{
		$sql="SELECT idobjeto, nombre, unidad FROM objeto
		WHERE idobjeto = '$idobjeto' AND borrado='N'";
		return ejecutarConsulta($sql);
	}

	public function editar($idobjeto,$nombre,$unidad)
	{
		$sql="UPDATE objeto
		SET nombre = '$nombre', unidad = '$unidad'
		WHERE idobjeto = '$idobjeto' AND borrado='N'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idobjeto)
	{
		$sql="UPDATE objeto
		SET borrado='S'
		WHERE idobjeto = '$idobjeto'";
		return ejecutarConsulta($sql);
		/*
		$sql="DELETE FROM objeto WHERE idobjeto = '$idobjeto'";
		return ejecutarConsulta($sql);
		*/
	}

    

}
    

?>