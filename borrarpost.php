<?php
session_start();
$_SESSION['inicioadmin'] = 0;
//Obtenemos la id atraves de la url
$id = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"],"?id=")+4);
if(empty($id))
{
	$id = null;
}
if($id != null)
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
		$sql = "DELETE FROM Post WHERE id_post = '$id'";
		$result = $dwes->query($sql);
		if($result)
		{
			echo "<script type='text/javascript'>
					alert('El post ha sido borrado satisfactoriamente.');
					window.location.href='admin.php';
			</script>";
		}
		else
		{
			$sql = "DELETE FROM Comentario WHERE id_post = '$id'";//45
			$result = $dwes->query($sql);
			if($result)
			{
				$sql = "DELETE FROM Post WHERE id_post = '$id'";
				$result = $dwes->query($sql);
				if($result)
				{
					echo "<script type='text/javascript'>
						alert('El post ha sido borrado satisfactoriamente.');
						window.location.href='admin.php';
					</script>";
				}
				else
				{
					echo "<script type='text/javascript'>
						alert('Error: EL post no ha sido borrado.');
						window.location.href='admin.php';
					</script>";
				}
			}
			else
			{
				echo "<script type='text/javascript'>
					alert('Error: EL post no ha sido borrado.');
					window.location.href='admin.php';
				</script>";
			}
		}
	}
}
else
{
	echo "<script type='text/javascript'>
			alert('Error: No se ha podido borrar el post.');
			window.location.href='admin.php';
	</script>";
}
?>