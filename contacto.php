<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>JILD Blog</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap-grid.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap-grid.min.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap-reboot.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap-reboot.min.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="vendor/bootstrap/css/bootstrap.css" rel="stylesheet">
        <!--JQUERY-->
        <script src="vendor/bootstrap/js/bootstrap.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/jquery/jquery.js"></script>
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/popper/popper.js"></script>
        <script src="vendor/popper/popper.min.js"></script>
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
    <!-- Navigation -->
    <?php
      //session_start();
      //$_SESSION['usuario'] = null;
      require_once("cabecera.php");
    ?>
    <!-- Page Content -->
    <div class="container">
      <br>
      <div class="row">
        <!-- Blog Entries Column 
          <h1 class="my-4">FORMULARIO DE CONTACTO<br>-->
          </h1>
          <!-- Blog Post -->
          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeCSf1DBt7RyirwJEg2dNXvJQdLNt_neR_-1XqOzDITFisoUw/viewform?embedded=true" style="width:100%; height:1120px;margin-top: -145px;"/> 
          </iframe>
          </div>        
      </div>
      <!-- /.row -->
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
