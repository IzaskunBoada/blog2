<?php 
  require_once("funciones.php");
  $filtro = $_GET['idfiltro'];
?>
<div id="div_dinamico_index_blog">
          <h1 class="my-4"><br>
            
          </h1>
          <!-- Blog Post -->
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
              $sql = "SELECT id_post, titulo, imagen, texto, fecha FROM Post WHERE id_categoria = (SELECT id_categoria FROM Categoria WHERE Nombre = '$filtro')";
              $year = "SELECT YEAR(fecha) FROM Post"; //año
              $mes = "SELECT MONTH(fecha) FROM Post"; //mes
              $dia = "SELECT DAY(fecha) FROM Post"; //dia

              $resultyear  = $dwes->query($year);
              $resultmes = $dwes->query($mes);
              $resultdia = $dwes->query($dia);

              $result = $dwes->query($sql);
              //&& $resultdia->num_rows > 0 && $resultmes->num_rows > 0 && $resultyear->num_rows > 0
              //&& $filadia = $resultdia->fetch_assoc() && $filames = $resultmes->fetch_assoc() && $filayear = $resultyear->fetch_assoc()
              if($result->num_rows > 0)
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
                    echo "<img class='card-img-top' src='img/".$fila['imagen']."'>";
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