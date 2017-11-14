<?php
session_start();
if(isset($_SESSION['usuario']))
{
  include("funciones.php");
}
?>
<script type="text/javascript" src="jquery/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="jquery/jquerys.js"></script>
<div class="container" id="div_dinamico_index">
      <br>
      <div class="row">
        <div class="col-md-8" id="div_dinamico_index_blog">
          <h1 class="my-4"><br>
            
          </h1>
          <!-- Blog Post -->
          <?php 
            $dwes = ConexionTotal();
            if(!$dwes)
            {
              echo"<table>
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
                        <p class='card-text'>".$fila['texto']."</p>
                        <a href='verpostentero.php?id=".$fila['id_post']."'><input type='button' value='Mostrar'></a>
                      </div>
                      <div class='card-footer text-muted'>Posteado el $dia de $mes de $anio</div>
                    </div>";
                }
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
          <!-- Blog Post -->
        </div>
        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">
          <!-- Search Widget -->
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
          <!-- Categories Widget -->
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
          <!-- Side Widget -->
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
      <!-- /.row -->
    </div>