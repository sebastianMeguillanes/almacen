<?php
require_once "../config/Conexion.php";

Class Almacen
{
    public function listar()
	{
		//$sql="SELECT idalmacen, nombre, idlocacion FROM almacen;";
		$sql="SELECT idalmacen, nombre, locacion.ubicacion FROM almacen INNER JOIN locacion ON almacen.idlocacion = locacion.idlocacion;";
		return ejecutarConsulta($sql);		
	}

	public function listarSelect()
	{
		$sql="SELECT idalmacen, nombre FROM almacen;";
		return ejecutarConsulta($sql);	
	}

	public function insertar($nombre,$locacion)
	{
		$sql="INSERT INTO almacen (nombre,idlocacion,fecha_reg,borrado,id_usuario)
		VALUES ('$nombre', '$locacion',NOW(),'N',NULL);";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idalmacen)
	{
		$sql="SELECT idalmacen, nombre, idlocacion FROM almacen
		WHERE idalmacen = '$idalmacen'";
		return ejecutarConsulta($sql);
	}

	public function editar($idalmacen,$nombre,$locacion)
	{
		$sql="UPDATE almacen
		SET nombre = '$nombre', idlocacion = '$locacion'
		WHERE idalmacen = '$idalmacen'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idalmacen)
	{
		$sql="DELETE FROM almacen WHERE idalmacen = '$idalmacen'";
		return ejecutarConsulta($sql);
	}

    

}
    

?>