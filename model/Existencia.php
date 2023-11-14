<?php
require_once "../config/Conexion.php";

Class Existencia
{
    public function listar()
	{
		$sql="SELECT c.idalmacen,c.idarticulo,p.nombre,pr.nombrearticulo,c.cantidad
        FROM existencia c
        INNER JOIN almacen p ON c.idalmacen = p.idalmacen
        INNER JOIN articulo pr ON c.idarticulo = pr.idarticulo
        WHERE c.borrado='N';";
		return ejecutarConsulta($sql);		
	}


    public function comprueba_duplicados($idalmacen,$idarticulo)
	{
		$resultado=0;
		$sql="SELECT COUNT(idarticulo) AS numero FROM existencia 
        WHERE idalmacen='$idalmacen' AND idarticulo='$idarticulo' AND borrado='N';";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['numero'];			
	}

    public function obtenerCantidad($idalmacen,$idarticulo)
    {
        $resultado=0;
		$sql="SELECT cantidad FROM existencia 
        WHERE idalmacen='$idalmacen' AND idarticulo='$idarticulo' AND borrado='N';";
		$resultado = ejecutarConsultaSimpleFila($sql);
		return $resultado['cantidad'];
    }


    public function insertar($idalmacen, $idarticulo, $cantidad)
    {
        $sql="INSERT INTO existencia (cantidad,idalmacen,idarticulo,fecha_reg,borrado)
		VALUES ('$cantidad', '$idalmacen','$idarticulo',CURRENT_TIMESTAMP,'N');";
		return ejecutarConsulta($sql);
    }

    public function editar($idalmacen, $idarticulo, $cantidad)
    {
        $sql="UPDATE existencia SET cantidad=$cantidad
        WHERE idalmacen='$idalmacen' AND idarticulo='$idarticulo' AND borrado='N';";
		return ejecutarConsulta($sql);
    }

    public function mostrar($idalmacen, $idarticulo)
    {
        $sql="SELECT 1 as bandera,idalmacen,idarticulo,cantidad FROM existencia 
        WHERE idalmacen='$idalmacen' AND idarticulo='$idarticulo' AND borrado='N';";
		return ejecutarConsulta($sql);
    }
}