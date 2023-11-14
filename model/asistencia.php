<?php
require_once "../config/Conexion.php";

Class asistencia
{
    public function listar()
	{
		$sql="SELECT f.idasistencia,f.fecha,f.ingreso,f.idusuario,u.nombrepersona 
		FROM asistencia f INNER JOIN persona u on u.idpersona = f.idusuario    
		WHERE f.borrado = 'N';";
		return ejecutarConsulta($sql);	
		


	}

	public function insertar($fecha,$ingreso,$idusuario)
	{
	/*	$ingreso = ejecutarConsulta('select ingreso	from asistencia	WHERE idusuario = 4 order by FECHA asc	limit 1;');
		if($ingreso == 'S'){
			$ingreso = 'N';
		}else{
			$ingreso = 'S';
		};*/
		$sql="INSERT INTO asistencia (fecha,ingreso,idusuario,fecha_reg,borrado,id_usuario)
		VALUES ('NOW()','$ingreso','$idusuario',NOW(),'N','1');";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idasistencia)
	{
		$sql="SELECT idasistencia, fecha, ingreso, idusuario FROM asistencia 
		WHERE idasistencia = '$idasistencia'";
		return ejecutarConsulta($sql);
	}

	public function editar($idasistencia,$fecha,$ingreso,$idusuario)
	{
		$sql="UPDATE asistencia
		SET fecha = '$fecha' , ingreso = '$ingreso' , idusuario = '$idusuario'
		WHERE idasistencia = '$idasistencia'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idasistencia)
	{
		$sql="UPDATE asistencia
		SET borrado = 'S'
		WHERE idasistencia = '$idasistencia'";
		return ejecutarConsulta($sql);
	}

    
	public function listarselect()
	{
		$sql="SELECT idpersona , nombrepersona
		FROM persona 
		WHERE borrado = 'N';";
		return ejecutarConsulta($sql);	
		


	}
}
    

?>