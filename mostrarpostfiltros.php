<?php
$cat = $_POST["categoria"];
?>
<script type="text/javascript" src="jquery/jquerys.js"></script>
<?php
echo "<table class='table-view' border='1' cellpadding='5'>";
$dwes = ConexionTotal();
if(!$dwes)
{
  echo"<tr>
  		<td align='left'>Error</td>
        <td align='left'>Error interno en la bd</td>
        <td align='right'><input type='submit' name='Modificar'></td>
        <td align='right'><input type='submit' name='Eliminar'></td>
       </tr>";
}
else
{
  $sql = "SELECT id_post, titulo, texto FROM Post WHERE categoria = '$cat'";
  $result = $dwes->query($sql);
  if($result->num_rows > 0)
  {
    while ($fila = $result->fetch_assoc()) {
    	echo "<tr>
    			<td align='left'>".$fila['titulo']."</td>
    			<td align='left'>".$fila['texto']."</td>
    			<td align='right'>
    				<input type='hidden' name='Modificar' value='".$fila['id_post']."'>
    				<input type='submit' name='Modificar' value='Modificar'>
    			</td>
        		<td align='right'>
        			<input type='hidden' name='Eliminar' value='".$fila['id_post']."'>
        			<input type='submit' name='Eliminar' value='Eliminar'>
        		</td>
    		</tr>";
    }
  }
  else
  {
    echo"<tr>
  		<td align='left'>Inexistente</td>
        <td align='left'>No hay ningun post introducido</td>
        <td align='right'><input type='submit' name='Modificar'></td>
        <td align='right'><input type='submit' name='Eliminar'></td>
       </tr>";
  }
}
$dwes = desconexionTotal($dwes);
echo "</table>";
?>