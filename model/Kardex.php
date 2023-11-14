<?php
require_once "../config/Conexion.php";

Class Kardex
{
    public function listar()
	{
		$sql="SELECT k.idkardex, a.nombre, b.nombrearticulo, cantidad, accion, fechakardex
		FROM kardex k
		INNER JOIN almacen a ON k.idalmacen = a.idalmacen
		INNER JOIN articulo b ON k.idarticulo = b.idarticulo
		AND k.borrado='N';";
		return ejecutarConsulta($sql);		
	}


	public function insertar($fecha,$accion,$idalmacen,$idusuario,$idarticulo,$cantidad)
	{
		$sql="INSERT INTO kardex (fechakardex, accion, idalmacen, idusuario, idarticulo, cantidad ,fecha_reg, borrado)
		VALUES ('$fecha','$accion','$idalmacen','$idusuario','$idarticulo','$cantidad',CURRENT_TIMESTAMP,'N');";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idkardex)
	{
		$sql="SELECT idkardex, idalmacen, idarticulo, cantidad, accion, fechakardex
		FROM kardex WHERE idkardex='$idkardex' AND borrado='N';";
		return ejecutarConsulta($sql);
	}

	public function editar($idkardex,$idalmacen,$idarticulo,$cantidad,$accion,$fecha,$idusuario)
	{
		$sql="UPDATE kardex
		SET idalmacen='$idalmacen',idarticulo='$idarticulo',cantidad='$cantidad',accion='$accion',fechakardex='$fecha',idusuario='$idusuario'
		WHERE idkardex='$idkardex';";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idkardex)
	{	
		$sql= "UPDATE kardex
		SET borrado = 'S'
		WHERE idkardex='$idkardex';";
		return ejecutarConsulta($sql);
	}

}
    

?>