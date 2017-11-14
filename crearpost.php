<?php
session_start();
if(isset($_SESSION['usuario']))
{
	$id_usuario = $_SESSION['usuario'];
}
if(isset($_POST["titulo"]))
{
	$titulo = $_POST["titulo"];
	if(empty($titulo))
	{
		$titulo = null;
	}
}
if(isset($_POST['archivo']))
{
	$imagen = $_POST['archivo'];
}
if(isset($_POST['editor1']))
{
	$texto = $_POST['editor1'];
	if(empty($texto))
	{
		$texto = null;
	}
}
if(isset($_POST['categoria']))
{
	$id_categoria = $_POST['categoria'];
	if(empty($id_categoria))
	{
		$id_categoria = null;
	}
}
$fecha=strftime( "%Y-%m-%d",time());
$_SESSION['inicioadmin'] = 0;
if($id_usuario != null && $titulo != null && $texto != null && $id_categoria != null && $fecha != null)
{
	require_once("funciones.php");
	$dwes = ConexionTotal();
	if(!$dwes)
	{
		echo "<script type='text/javascript'>
					alert('Conexion fallida.');
					window.location.href='admin.php';
			</script>";
	}
	else
	{
		$sql = "INSERT INTO Post (id_post, id_usuario, fecha, titulo, imagen, texto, id_categoria) VALUES (null,'$id_usuario','$fecha','$titulo','$imagen','$texto','$id_categoria')";
		$result = $dwes->query($sql);
		if($result)
		{
			echo "<script type='text/javascript'>
					alert('Se ha guardado satisfactoriamente.');
					window.location.href='admin.php';
			</script>";
		}
		else
		{
			echo "<script type='text/javascript'>
					alert('No se ha guardado con exito.');
					window.location.href='admin.php';
			</script>";
		}
	}
}
else
{
	echo "<script type='text/javascript'>
			alert('Error: No se han introducido los suficientes datos para crear un post.');
			window.location.href='admin.php';
	</script>";
}
?>