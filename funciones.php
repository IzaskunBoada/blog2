<?php
function conexionTotal()
{
	require_once("conexion.php");
	$dwes = Conectar();
		if($dwes)
		{
			return $dwes;
		}
		else
		{
			return 0;
		}
}
function desconexionTotal($dwes)
{
	require_once("conexion.php");
	$opc = Desconectar($dwes);
	return null;
}
function sacarUsuario($nombre, $password){
	require_once("conexion.php");
	$dwes = Conectar();
	if($dwes != null)
	{	
		$sql = "SELECT id_usuario FROM Usuario WHERE Nombre = '$nombre' AND Password = '$password'";
		$result = $dwes->query($sql);
		if($result)
		{
			$row = $result->fetch_assoc();
			if(count($row) > 0)
			{
				return $row["id_usuario"];
			}	
			else
			{
				return 0;
			}
		}
		else{
			return 0;
		}
		Desconectar($dwes);
	}
	else
	{
		return 0;
	}
}
function sacarNombreUsuario($codigo){
	require_once("conexion.php");
	$dwes = Conectar();
	if($dwes != null)
	{
		$sql = "SELECT Nombre FROM Usuario WHERE id_usuario = '$codigo'";
		$result = $dwes->query($sql);
		if($result)
		{
			$row = $result->fetch_assoc();
			return $row['Nombre'];
		}
		else
		{
			return "administrador";
		}
	}
	else
	{
		return 0;
	}
}
?>