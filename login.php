<?php 
    include("funciones.php");
    $opc = 1;
    if(isset($_POST['enviar'])){    
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $opc = sacarUsuario($usuario,$password);
        if($opc == 1)
        {
            session_start();
            $_SESSION['usuario'] = $opc;
            header('Location: admin.php');
            exit();
        }
    }
    if(isset($_POST['salir']))
    {
        header('Location: index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/blog-home.css" rel="stylesheet">
        <script src="js/md5.js" type="text/javascript"></script>
    </head>
    <body>
        <center>
            <div class="container">
                <div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Iniciar Sesión</h3>
                            </div>
                                <div class="panel-body">
                                    <form accept-charset="UTF-8" role="form" method="post">
                                    <fieldset>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Usuario" name="usuario" type="text">
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Contraseña" name="password" type="password" value="">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <?php 
                                                if($opc == 0)
                                                {
                                                    ?>
                                                    <label style="color:red"><h4>Acceso Denegado</h4></label><br>
                                                    <?php
                                                }
                                            ?>
                                            <input name="remember" type="checkbox" value="Remember Me"> Recuerdamé
                                        </label>
                                    </div>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="enviar" name="enviar">
                                    <input class="btn btn-lg btn-success btn-block" type="submit" value="Salir" name="salir">
                                </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </center>
    </body>
</html>