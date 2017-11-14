<?php
session_start();
$id = substr($_SERVER["REQUEST_URI"], strpos($_SERVER["REQUEST_URI"],"?id=")+4);
?>
<!DOCTYPE html>
<html lang="es">
	<head>
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">
	    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" /> 
	    <title>JILD Blog</title>
	    <!-- Bootstrap core CSS -->
	    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	    <!-- Custom styles for this template -->
	    <!--<link href="css/blog-home.css" rel="stylesheet">-->
	    <!-- js del login -->
	    <script src="js/md5.js"></script>
	    <!--<script src="js/login.js"></script>-->
	    <!--JQUERY-->
	    <script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
	    <script type="text/javascript" src="jquery/jquerys.js"></script>
	    <!--CSS-->
        <link href="css/blog-home.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
  	</head>
  	<body>
	  	<?php
	  		if(!isset($_SESSION['usuario']))
			{
				$_SESSION['usuario'] = null;
		    	$_SESSION['inicioadmin'] = 0;
			}
		    require_once("cabecera.php");
		    require_once("funciones.php");
	    ?>
	    <div class="container">
	    	<br>
	    	<div class="row">
	    		<div class="col-md-8" id="div_dinamico_index_blog" style="margin-right: auto">
          			<h1 class="my-4"><br></h1>
         			<?php 
			            $dwes = ConexionTotal();
			            if(!$dwes)
			            {
			              echo" <table>
			                      <tr>
			                      <td align='left'>Error</td>
			                        <td align='left'>Error interno en la bd</td>
			                        <td align='right'><input type='submit' name='Modificar'></td>
			                        <td align='right'><input type='submit' name='Eliminar'></td>
			                       </tr>
			                     </table>";
			            }
			            else
			            {
			              $sql = "SELECT id_post, titulo, imagen, texto, fecha FROM Post WHERE id_post ='$id'";
			              $year = "SELECT YEAR(fecha) FROM Post"; //año
			              $mes = "SELECT MONTH(fecha) FROM Post"; //mes
			              $dia = "SELECT DAY(fecha) FROM Post"; //dia

			              $resultyear  = $dwes->query($year);
			              $resultmes = $dwes->query($mes);
			              $resultdia = $dwes->query($dia);


			              $result = $dwes->query($sql);
			              //&& $resultdia->num_rows > 0 && $resultmes->num_rows > 0 && $resultyear->num_rows > 0
			              //&& $filadia = $resultdia->fetch_assoc() && $filames = $resultmes->fetch_assoc() && $filayear = $resultyear->fetch_assoc()
			              if($result->num_rows > 0 )
			              {
			                while ($fila = $result->fetch_assoc() ) {
			                  	//<!--psteado el 14 de agosto de 2017-->
			                  	list($anio, $mesnum, $dia) = explode("-",$fila['fecha']);
			                  	switch ($mesnum) {
				                    case '01': $mes="Enero";     break;
				                    case '02': $mes="Febrero";   break;
				                    case '03': $mes="Marzo";     break;
				                    case '04': $mes="Abril";     break;
				                    case '05': $mes="Mayo";      break;
				                    case '06': $mes="Junio";     break;
				                    case '07': $mes="Julio";     break;
				                    case '08': $mes="Agosto";    break;
				                    case '09': $mes="Septiembre";break;
				                    case '10': $mes="Octubre";   break;
				                    case '11': $mes="Noviembre"; break;
				                    case '12': $mes="Diciembre"; break;
				                    default:                     break;
			                  	}
			                echo"<div class='card mb-4'>";
			                if (empty($fila['imagen'])){
			                    echo"<img class='card-img-top' src='img/imagen-no-disponible.gif'>";
			                }else{
			                    echo "  <img class='card-img-top' src='img/".$fila['imagen']."'>";
			                }
			                echo"<div class='card-body'>
			                        <h2 class='card-title'>".$fila['titulo']."</h2>
			                        <p class='card-text'>".$fila['texto']."</p>";
			                        if(isset($_SESSION['usuario']))
			                        {
			                        	echo "<a href='admin.php'><input type='button' value='Atras'></a>";
			                        }
			                        else
			                        {
			                        	echo "<a href='index.php'><input type='button' value='Atras'></a>";
			                        }
			                      echo "</div>
			               
			                <div class='card-footer text-muted'>Posteado el $dia de $mes de $anio</div>
			                </div>
			                <h2>Comentarios</h2>";
			                $sql2 ="SELECT * FROM Comentario WHERE id_post = '$id' ORDER BY fecha DESC";
			                $result2 = $dwes->query($sql2);
			                if($result2->num_rows > 0)
			                {
			                	echo "<div class='card-body card mb-4'>";
			                	while ($fila2 = $result2->fetch_assoc()) {
			                		echo "<table style='width: 100%;' cellpadding='5'>
			                				<tr>
			                					<td style='text-align: left;'>".$fila2['texto']."</td>
			                				</tr>
			                				<tr>";
			                					if(isset($_SESSION['usuario']))
			                					{
			                						echo "<td align='left'>
            											<a href='eliminarcomentario.php?id=".$fila2['id_comentario']."'><input type='button' value='Eliminar'></a>
          											</td>";
			                					}
			                					echo "<td style='text-align: right;'>".$fila2['fecha']."</td>
			                				</tr>
			                			</table>";
			                	}
			                	echo "</div>";
			                }
			                else
			                {
			                	echo "<div class='card-body'>No hay ningun comentario</div>";
			                }
			                //Introducir texto para poder introducir comentarios
			                echo "<form name='formcoment' action='crearcomentario.php' method='post'>
									<div align='center' style='width: 100%;'>
										<textarea style='width: 100%;' cols='40' rows='5' name='comentario'></textarea><br>
										<input type='hidden' name='id' value='".$id."'>
										<td align='right'><input type='submit' name='Añadir' value='Comentar'></td>
										<br><br>
									</div>
								</form>";
			                }
			                //echo "</div>";
			              }
			              else
			              {
			                echo"
			                <table>
			                <tr>
			                  <td align='left'>Inexistente</td>
			                    <td align='left'>No hay ningun post introducido</td>
			                    <td align='right'><input type='submit' name='Modificar'></td>
			                    <td align='right'><input type='submit' name='Eliminar'></td>
			                   </tr>
			                   </table>";
			              }
			            }
			            $dwes = desconexionTotal($dwes);              
			        ?>
        		</div>	
	    	</div>
	    </div>
	    <?php 
	    	require_once("footer.php");
	    ?>
	    <!-- Bootstrap core JavaScript -->
	    <script src="vendor/jquery/jquery.min.js"></script>
	    <script src="vendor/popper/popper.min.js"></script>
	    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  	</body>
</html>