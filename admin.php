<?php
//Abrimos la sesion
session_start();
//COmrpobamos que hay un usuario conectado por el login.
if(isset($_SESSION['usuario']))
{
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
      </head>
      <body>
        <?php
          //Insertamos la cabecera
          require_once("cabecera.php");
        ?>
        <!-- Creamos un contenedor para que se modifique el interior-->
        <div class="container" id="div_dinamico_admin">
          <?php
            require_once("mostrarpostadmin.php");
          ?>
        </div>
        <?php 
          require_once("footer.php");
        ?>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
      </body>
  </html>
  <?php 
}
else
{
  //Si no te conectastes con el admin te volvera al index
  header('Location: index.php');  
}
?>