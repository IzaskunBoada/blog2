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
  </head>
  <body>
    <!-- Navigation -->
    <?php
      session_start();
      $_SESSION['usuario'] = null;
      $_SESSION['inicioadmin'] = 0;
      require_once("cabecera.php");
      require_once("funciones.php");
    ?>
    <!-- Page Content -->
    <div class="container" id="div_dinamico_index">
      <div class="row">
        <div class="col-md-8" id="div_dinamico_index_blog">
          <h1 class="my-4"><br>
          </h1>
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
              $sql = "SELECT id_post, titulo, imagen, texto, fecha FROM Post";
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
                        <p class='card-text'>".$fila['texto']."</p>
                        <a href='verpostentero.php?id=".$fila['id_post']."'><input type='button' value='Mostrar'></a>
                      </div>
                      <div class='card-footer text-muted'>Posteado el $dia de $mes de $anio</div>
                    </div>";
                }
              }
              else
              {
                //Modificarlo ponerlo bonito
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
        <div class="col-md-4">
          <!--
          <div class="card my-4">
            <h5 class="card-header">Buscar post</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
              </div>
            </div>
          </div>
          -->
          <div class="card my-4">
            <h5 class="card-header">Categorias</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a id="filtro_php" href="#">PHP</a>
                    </li>
                    <li>
                      <a id="filtro_javascript" href="#">JavaScript</a>
                    </li>
                    <li>
                      <a id="filtro_jquery" href="#">JQuery</a>
                    </li>
                  </ul>
                </div>
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                    <li>
                      <a id="filtro_tutoriales" href="#">Tutoriales</a>
                    </li>
                    <li>
                      <a id="filtro_errores" href="#">Errores</a>
                    </li>
                    <li>
                      <a id="filtro_bd" href="#">BD</a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="card my-4">
            <h5 class="card-header">Ultimas entradas</h5>
            <div class="card-body">
              <?php 
                $dwes = ConexionTotal();
                if(!$dwes)
                {
                  echo"No se encuentra las entradas";
                }
                else
                {
                  $sql2 = "SELECT * FROM Post ORDER BY id_post DESC LIMIT 3";
                  $result2 = $dwes->query($sql2);
                  if($result2->num_rows > 0 )
                  {
                    echo "<div class='col-lg-6'>
                            <ul class='list-unstyled mb-0'>";
                    while ($fila2 = $result2->fetch_assoc()) {  
                      echo "<li>
                              <a href='verpostentero.php?id=".$fila2['id_post']."'>".$fila2['titulo']."</a>
                            </li>";
                    }
                    echo "</ul>
                    </div>";
                  }
                  else
                  {
                    echo"No se encuentra las entradas";
                  }
                }
               ?>
            </div>
          </div>
          <div class="card my-4">
            <h5 class="card-header">Blogs de interes</h5>
            <div class="card-body">
              <a href="https://www.w3schools.com/" target="_blank">W3school</a><br>
              <a href="https://www.arkaitzgarro.com/" target="_blank">Arkaitz Garro</a>
            </div>
          </div>
          <div class="card my-4">
            <h5 class="card-header">Redes sociales</h5>
            <div class="card-body">
              <a href="https://es-es.facebook.com/" target="_blank"><img src="img/facebook.ico" alt="facebook" width="50" height="50"></a>
              <a href="https://twitter.com/?lang=es" target="_blank"><img src="img/twitter.ico" alt="facebook" width="50" height="50"></a>
              <a href="https://www.instagram.com/?hl=es" target="_blank"><img src="img/instagram.png" alt="facebook" width="50" height="50"></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /.container -->
    <!-- Footer -->
    <?php 
      require_once("footer.php");
    ?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>
