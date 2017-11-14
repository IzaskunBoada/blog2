<?php 
session_start();
if(isset($_SESSION['usuario']))
{
	$id = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"],"?id=")+4);
	$_SESSION['id_post'] = $id;
  ?>
  <!DOCTYPE html>
    <html lang="en">
      <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>JILD Blog</title>
        <!--BOOTSTRAP-->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!--JQUERY-->
        <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="jquery/jquerys.js"></script>
        <!--CSS-->
        <link href="css/blog-home.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <!--MD5-->
        <script src="js/md5.js"></script>
        <script src="js/funcion.js" type="text/javascript"></script>
        <!--CKEDITOR-->
        <script src="ckeditor/ckeditor.js"></script>
        <script>
          CKEDITOR.replace('editor1');
        </script>
		<!---->
      </head>
      <body>
        <?php
        	require_once("cabecera.php");
        ?>
        <div class="container" id="div_dinamico_admin" style="margin-top: 2%">
        	<?php
        		$dwes = ConexionTotal();
        		if(!$dwes)
        		{

        		}
        		else
        		{
        			$sql = "SELECT titulo, texto, imagen, id_categoria FROM Post WHERE id_post = '$id'";
  					$result = $dwes->query($sql);
  					if($result->num_rows > 0)
  					{
  						while ($fila = $result->fetch_assoc()){
  							echo "<form action='modificarpost.php' method='post' accept-charset='utf-8'>
        							<h2>Modificar Post</h2>
									<label>Titulo: </label><input value='".$fila['titulo']."' type='text' name='titulo'><br>
									<label>Imagen: </label><input value='".$fila['imagen']."' name='archivo' type='file' id='archivo' onblur='validaArchivo(this,1);'/>

									<label style='margin-left: 100px'>Categorias: </label>";
									echo "<select name='categoria'>";
									$sql2 = "SELECT * FROM Categoria";
									$result2 = $dwes->query($sql2);
									if($result2)
									{
										while ($fila2 = $result2->fetch_assoc()) {
									    if($fila2['id_categoria'] == $fila['id_categoria'])
									    {
									    	echo"<option value=".$fila2['id_categoria']." selected>".$fila2['Nombre']."</option>";
									    }
									    else
									    {
									      	echo"<option value='".$fila2['id_categoria']."'>".$fila2['Nombre']."</option>";
									    }
									    }
									  }
									else
									{
										echo"<option value='inexistente'>-----</option>";
									}
									$dwes = desconexionTotal($dwes);
									echo "<select>";
									echo "<textarea class='form-control' name='editor1'>".$fila['texto']."</textarea>
									<input type='submit' id='modificar_post' value='Modificar'>
									<input type='button' id='crear_post_atras' value='Cancelar'>
        						</form>";
  						}
  					}
        		}
        		$dwes = desconexionTotal($dwes);
        	?>
        </div>
        <?php 
          require_once("footer.php");
        ?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script>
          CKEDITOR.replace('editor1');
        </script>
      </body>
  </html>
  <?php 
}
else
{
  header('Location: index.php');  
}
?>