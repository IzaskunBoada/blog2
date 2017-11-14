


<?php 
	require_once("funciones.php");
?>
<script src="ckeditor/ckeditor.js"></script>
<script src="js/funcion.js" type="text/javascript"></script>
<script>
	CKEDITOR.replace('editor1');
</script>
<br><br>
<form action="crearpost.php" method="post" accept-charset="utf-8" class="formanadir">
	<h2>Crear Post</h2>
	<label>Titulo: </label><input type="text" name="titulo"><br>
	<label>Imagen: </label><input name="archivo" type="file" id="archivo" onblur="validaArchivo(this,1);"/>
	<label style="margin-left: 100px">Categorias: </label>
	<?php
		include("mostrarcategorias.php");
    ?>
	<textarea class="form-control" name="editor1"></textarea>
	<input type="submit" id="crear_post" value="Añadir">
	<input type="button" id="crear_post_atras" value="Cancelar">
</form>
<br><br>