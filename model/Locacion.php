<?php
require_once "../config/Conexion.php";

Class Locacion
{
    public function listar()
	{
		$sql="SELECT idlocacion, ubicacion FROM locacion WHERE borrado='N'";
		return ejecutarConsulta($sql);		
	}


	public function insertar($ubicacion)
	{
		$sql="INSERT INTO locacion (ubicacion,borrado,fecha_reg  )
		VALUES ('$ubicacion','N',CURRENT_TIMESTAMP);";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idlocacion)
	{
		$sql="SELECT idlocacion, ubicacion FROM locacion 
		WHERE idlocacion = '$idlocacion'";
		return ejecutarConsulta($sql);
	}

	public function editar($idlocacion,$ubicacion)
	{
		$sql="UPDATE locacion
			SET ubicacion = '$ubicacion' 
			WHERE idlocacion = '$idlocacion'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idlocacion)
	{		
		$sql="UPDATE locacion
		SET borrado = 'S' 
		WHERE idlocacion = '$idlocacion'";
		return ejecutarConsulta($sql);
	}

}
    

?>