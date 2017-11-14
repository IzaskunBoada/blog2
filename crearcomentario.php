<?php
session_start();
$texto = $_POST['comentario'];
$id_post = $_POST['id'];
if(empty($texto))
{
	$texto = null;
}
if(empty($id_post))
{
	$id_post = null;
}
$fecha=strftime( "%Y-%m-%d",time());
if($texto != null)
{
	require_once("funciones.php");
	$dwes = ConexionTotal();
	if(!$dwes)
	{
		if(isset($_SESSION['usuario']))
		{
			echo "<script type='text/javascript'>
					alert('Conexion fallida.');
					window.location.href='admin.php';
			</script>";
		}
		else
		{
			echo "<script type='text/javascript'>
					alert('Conexion fallida.');
					window.location.href='index.php';
			</script>";
		}
	}
	else
	{
		$sql = "INSERT INTO Comentario (id_comentario, id_post, id_secundario, fecha, texto) VALUES (null, '$id_post', null,'$fecha','$texto')";
		$result = $dwes->query($sql);
		if($result)
		{
			if(isset($_SESSION['usuario']))
			{
				echo "<script type='text/javascript'>
					alert('Se ha guardado satisfactoriamente.');
					window.location.href='admin.php';
				</script>";
			}
			else
			{
				echo "<script type='text/javascript'>
					alert('Se ha guardado satisfactoriamente.');
					window.location.href='index.php';
				</script>";
			}
		}
		else
		{
			if(isset($_SESSION['usuario']))
			{
				echo "<script type='text/javascript'>
					alert('No se ha guardado con exito.');
					window.location.href='admin.php';
				</script>";
			}
			else
			{
				echo "<script type='text/javascript'>
					alert('No se ha guardado con exito.');
					window.location.href='index.php';
				</script>";
			}
		}
	}
}
else
{
	if(isset($_SESSION['usuario']))
	{
		echo "<script type='text/javascript'>
			alert('Error: No se ha podido crear el comentario.');
			window.location.href='admin.php';
		</script>";
	}
	else
	{
		echo "<script type='text/javascript'>
			alert('Error: No se ha podido crear el comentario.');
			window.location.href='index.php';
		</script>";
	}
}
?>