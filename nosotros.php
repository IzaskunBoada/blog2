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
        <!-- Blog Entries Column -->
        <div class="col-md-8">
          <h1 class="my-4">JILD<br>
            <small>Titulo</small>
          </h1>
          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="imgNosotros" src="img/logoNosotros.png" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title">Un poco de informacion sobre nosotros</h2>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
              <a href="#" class="btn btn-primary">Read More &rarr;</a>
            </div>
          </div>
          <!-- Pagination -->
          
        </div>
        <!-- Sidebar Widgets Column -->
        
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
