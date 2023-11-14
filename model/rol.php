<?php
require_once "../config/Conexion.php";

Class rol
{
    public function listar()
	{
		$sql="SELECT idrol, nombrerol FROM rol
		WHERE borrado = 'N'";
		return ejecutarConsulta($sql);		
	}

	public function insertar($nombrerol)
	{
		$sql="INSERT INTO rol (nombrerol,borrado)
		VALUES ('$nombrerol','N');";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idrol)
	{
		$sql="SELECT idrol, nombrerol FROM rol 
		WHERE idrol = '$idrol'";
		return ejecutarConsulta($sql);
	}

	public function editar($idrol,$nombrerol)
	{
		$sql="UPDATE rol
		SET nombrerol = '$nombrerol'
		WHERE idrol = '$idrol'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idrol)
	{
		$sql="UPDATE rol
		SET borrado = 'S'
		WHERE idrol = '$idrol'";
		return ejecutarConsulta($sql);
	}

    

}
    

?>