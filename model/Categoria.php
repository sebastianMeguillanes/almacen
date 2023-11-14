<?php
require_once "../config/Conexion.php";

Class Categoria
{
    public function listar()
	{
		$sql="SELECT idcategoria, nombrecategoria FROM categoria WHERE borrado = 'N'";
		return ejecutarConsulta($sql);		
	}

	public function listarSelect()
	{
		$sql="SELECT idcategoria, nombrecategoria FROM categoria;";
		return ejecutarConsulta($sql);	
	}

	public function insertar($nombrecategoria)
	{
		$sql="INSERT INTO categoria (nombrecategoria,borrado )
		VALUES ('$nombrecategoria','N');";
		return ejecutarConsulta($sql);
	}

	public function mostrar($idcategoria)
	{
		$sql="SELECT idcategoria, nombrecategoria FROM categoria 
		WHERE idcategoria = '$idcategoria'";
		return ejecutarConsulta($sql);
	}

	public function editar($idcategoria,$nombrecategoria)
	{
		$sql="UPDATE categoria
		SET nombrecategoria = '$nombrecategoria' 
		WHERE idcategoria = '$idcategoria'";
		return ejecutarConsulta($sql);
	}

	public function eliminar($idcategoria)
	{		
		$sql="UPDATE categoria
		SET borrado = 'S' 
		WHERE idcategoria = '$idcategoria'";
		return ejecutarConsulta($sql);
	}

}
    

?>