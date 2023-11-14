<?php
require_once "../config/Conexion.php";

Class lote
{
    public function listar()
	{
		$sql="SELECT f.idlote,f.fecha,f.idproveedor,u.nombreproveedor 
		FROM lote f INNER JOIN proveedor u on u.idproveedor = f.idproveedor    
		WHERE f.borrado = 'N';";
		return ejecutarConsulta($sql);		
	}

	public function insertar($fecha,$idproveedor)
	{
		$sql="INSERT INTO lote (fecha,idproveedor,fecha_reg,borrado,id_usuario)
		VALUES ('$fecha','$idproveedor',NOW(),'N','1');";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idlote)
	{
		$sql="SELECT idlote, fecha, idproveedor FROM lote 
		WHERE idlote = '$idlote'";
		return ejecutarConsulta($sql);
	}

	public function editar($idlote,$fecha,$idproveedor)
	{
		$sql="UPDATE lote
		SET fecha = '$fecha' , idproveedor = '$idproveedor'
		WHERE idlote = '$idlote'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idlote)
	{
		$sql="UPDATE lote
		SET borrado = 'S'
		WHERE idlote = '$idlote'";
		return ejecutarConsulta($sql);
	}

    

}
    

?>