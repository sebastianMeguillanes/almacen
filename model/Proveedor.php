<?php
require_once "../config/Conexion.php";

Class Proveedor
{
    public function listar()
	{
		$sql="SELECT idproveedor, nombreproveedor, correoproveedor, telefonoproveedor FROM proveedor
		WHERE borrado='N'";
		return ejecutarConsulta($sql);		
	}

	public function listarSelect()
	{
		$sql="SELECT idproveedor, nombreproveedor FROM proveedor
		WHERE borrado='N'";
		return ejecutarConsulta($sql);		
	}


	public function insertar($nombre,$correo,$telefono)
	{
		$sql="INSERT INTO proveedor (nombreproveedor,correoproveedor,telefonoproveedor,fecha_reg,borrado)
		VALUES ('$nombre', '$correo','$telefono',CURRENT_TIMESTAMP,'N');";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idproveedor)
	{
		$sql="SELECT idproveedor, nombreproveedor, correoproveedor, telefonoproveedor FROM proveedor 
		WHERE idproveedor = '$idproveedor'";
		return ejecutarConsulta($sql);
	}

	public function editar($idproveedor,$nombre,$correo,$telefono)
	{
		$sql="UPDATE proveedor
		SET nombreproveedor = '$nombre', correoproveedor = '$correo', telefonoproveedor = '$telefono'
		WHERE idproveedor = '$idproveedor'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idproveedor)
	{
		$sql="UPDATE proveedor
		SET borrado = 'S'
		WHERE idproveedor = '$idproveedor'";
		/*
		$sql="DELETE FROM proveedor WHERE idproveedor = '$idproveedor'";
		*/
		return ejecutarConsulta($sql);
	}

    

}
    

?>