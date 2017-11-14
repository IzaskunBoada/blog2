<?php 
?>
<script type="text/javascript" src="jquery/jquerys.js"></script>
<?php
echo "<select name='categoria'>";
$dwes = ConexionTotal();
if($dwes == 0)
{
  echo"<option value='error'>Error</option>";
}
else
{
  $sql = "SELECT * FROM Categoria";
  $result = $dwes->query($sql);
  if($result)
  {
    while ($fila = $result->fetch_assoc()) {
      echo"<option value='".$fila['id_categoria']."'>".$fila['Nombre']."</option>";
    }
  }
  else
  {
    echo"<option value='inexistente'>-----</option>";
  }
}
$dwes = desconexionTotal($dwes);
echo "<select>";
?>