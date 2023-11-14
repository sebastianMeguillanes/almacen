<?php
require_once "../config/Conexion.php";

Class Articulo
{
    public function listar()
	{
		$sql="SELECT a.idArticulo, a.nombreArticulo, a.codigobarra, a.articulostock, c.nombrecategoria
		FROM articulo a
		INNER JOIN categoria c
		ON a.idcategoria = c.idcategoria AND a.borrado='N';";
		return ejecutarConsulta($sql);		
	}

	public function listarSelect()
	{
		$sql="SELECT idarticulo, nombrearticulo FROM articulo;";
		return ejecutarConsulta($sql);		
	}

	public function insertar($nombreArticulo, $codigoBarra, $articuloStock, $categoria)
	{
		$sql="INSERT INTO articulo (nombreArticulo, codigobarra, articulostock, idcategoria, fecha_reg, borrado)
		VALUES ('$nombreArticulo', $codigoBarra,$articuloStock, $categoria,CURRENT_TIMESTAMP, 'N');";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idArticulo)
	{		
		$sql="UPDATE articulo
		SET borrado = 'S' 
		WHERE idArticulo = '$idArticulo'";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idArticulo)
	{
		$sql="select idArticulo, nombreArticulo, codigobarra, articulostock, idcategoria FROM articulo 
		WHERE idarticulo = $idArticulo";
		return ejecutarConsulta($sql);
	}

	public function editar($idArticulo,$nombreArticulo, $codigoBarra, $articuloStock)
	{
		$sql="UPDATE articulo
		SET nombreArticulo = '$nombreArticulo', codigoBarra = $codigoBarra, articuloStock = $articuloStock
		WHERE idarticulo=$idArticulo;";
		return ejecutarConsulta($sql);
	}



}
    

?>