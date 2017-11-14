<?php 
  require_once("funciones.php");
?>
<script type="text/javascript" src="jquery/jquerys.js"></script>
<form class='card my-4'>
  <fieldset class='m-md-2'>
    <table style='width: 100%;' cellpadding='5'>
      <tr>  
        <td align='left'><label><b style='font-size: 22px'>Administrador de Post</b></label></td>
          <!--
          <td align='right'>
            <label>Categorias:</label>
            <?php
              //include("mostrarcategorias.php");
            ?>
          </td>
          <td align='left'><input type='button' id='filtro_categorias_post' name='buscar' value='Buscar'></td>-->
          <td align='right'><input type='button' id='ventana_agregar_post' name='anadir' value='Añadir'></td>
      </tr>
    </table>
        <?php
            include("mostrarpost.php");
        ?>
  </fieldset>
</form>