<?php
//session_start();
require_once "../config/Conexion.php";

Class Utilitario
{
    public function listar()
	{
		$sql="SELECT u.idutilitario,o.nombre, u.cantidad, u.ingresosalida, u.fecha
		FROM utilitario u
		INNER JOIN objeto o
		ON u.idobjeto = o.idobjeto AND u.borrado='N';";
		return ejecutarConsulta($sql);		
	}

	public function insertar($cantidad, $ingresosalida, $fecha,$idobjeto,$idusuario)
	{
		$sql="INSERT INTO utilitario (cantidad,ingresosalida,fecha,idusuario,idobjeto,fecha_reg,borrado,id_usuario)
		VALUES ('$cantidad', '$ingresosalida', '$fecha','$idusuario','$idobjeto',NOW(),'N',NULL);";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idutilitario)
	{
		$sql="SELECT idobjeto, cantidad, ingresosalida, fecha FROM utilitario
		WHERE idutilitario = '$idutilitario' AND borrado = 'N'";
		return ejecutarConsulta($sql);
	}

	public function editar($idutilitario, $cantidad, $ingresosalida, $fecha,$idobjeto)
	{
		$sql="UPDATE utilitario
		SET cantidad = '$cantidad',ingresosalida = '$ingresosalida',fecha = '$fecha',idobjeto = '$idobjeto'
		WHERE idutilitario = '$idutilitario' AND borrado = 'N'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idutilitario)
	{
		$sql="UPDATE utilitario
		SET borrado='S'
		WHERE idutilitario = '$idutilitario'";
		return ejecutarConsulta($sql);
	}

    

}
    

?>