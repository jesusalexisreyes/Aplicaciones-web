<?php

// Iniciamos o retomamos la sesión

if(!isset($_SESSION)) {
  session_start();
//session_destroy();

    if(isset($_SESSION['usuarioId'])) header('Location: index.php');

}

// Incluimos la conexión a la BD
include("conn/connLocalhost.php");
include("includes/utils.php");

// Validamos que el formulario se haya enviado
if(isset($_POST['sent'])) {
  // validamos campos vacios
  foreach ($_POST as $calzon => $caca) {
    if($caca == "") $error[] = "The field $calzon is required";
  }

  // Continuamos con la validación siempre y cuando estemos libres de errores
  if(!isset($error)) {
    // Armamos la consulta con datos sanitizados
    $queryLoginUser = sprintf("SELECT idUsuario, Nivel, Nombre, Correo,Direccion FROM usuario WHERE Correo = '%s' AND Contraseña = '%s'",
        mysqli_real_escape_string($connLocalhost, trim($_POST['Correo'])),
        mysqli_real_escape_string($connLocalhost, trim($_POST['Contraseña']))
    );

    // Ejecutamos el query
    $resQueryLoginUser = mysqli_query($connLocalhost, $queryLoginUser) or trigger_error("The query for user validation has failed");

    //Evaluamos el resultado, si es exitoso, creamos los indices de sesión
    if(mysqli_num_rows($resQueryLoginUser)) {
      // Hacemos un fetch del resultset
      $userData = mysqli_fetch_assoc($resQueryLoginUser);

      // Definimos los indices de sesión
      $_SESSION['usuarioId'] = $userData['idUsuario'];
        $_SESSION['usuarioNivel'] = $userData['Nivel'];
          $_SESSION['usuarioNombre'] = $userData['Nombre'];
      $_SESSION['usuarioCorreo'] = $userData['Correo'];
        $_SESSION['usuarioCorreo'] = $userData['Contraseña'];
      $_SESSION['UsuarioDireccion'] = $userData['Direccion'];

      // Una vez definidos los indices de sesion realizamos una redirección hacia Control Panel

if ($_SESSION['usuarioNivel']==1) {
  header("Location: index_admin.php?login=true");
}if ($_SESSION['usuarioNivel']==2) {
  header("Location: index_usr.php?login=true");
}if ($_SESSION['usuarioNivel']==3) {
  header("Location: index_proveedor.php?login=true");
}


    }
    else {
      $error[] = "The credentials provided were incorrect... please try again!";
    }

  }

}

?>
<!DOCTYPE html>
<html lang="en">
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>Inicio</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Design fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,700" rel="stylesheet">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- FontAwesome Icons core CSS -->
    <link href="css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

    <!-- Animate styles for this template -->
    <link href="css/animate.css" rel="stylesheet">

    <!-- Responsive styles for this template -->
    <link href="css/responsive.css" rel="stylesheet">

    <!-- Colors for this template -->
    <link href="css/colors.css" rel="stylesheet">

    <!-- Version Marketing CSS for this template -->
    <link href="css/version/marketing.css" rel="stylesheet">


  <script type="text/javascript">
  <!--
  function MM_jumpMenuGo(objId,targ,restore){ //v9.0
    var selObj = null;  with (document) {
    if (getElementById) selObj = getElementById(objId);
    if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
    if (restore) selObj.selectedIndex=0; }
  }
  //-->
  </script>

</head>
<body background="images\ima.jpg">

    <div id="wrapper">
      <header class="market-header header">
          <div class="container-fluid">
              <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                  </button>
                  <a class="navbar-brand" href="marketing-index.html"><img src="images/.png" alt=""></a>
                  <div class="collapse navbar-collapse" id="navbarCollapse">
                      <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                              <a class="nav-link" href="marketing-index.html">Inicio</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="marketing-contact.html">Contactanos</a>
                          </li>
                      </ul>
                  </div>
              </nav>
          </div><!-- end container-fluid -->
      </header><!-- end market-header -->

      <section id="cta" >
            <div class="container" >
                <div class="row" >
                    <div class="col-lg-8 col-md-12 align-self-center">
                        <h2></h2>
                        <img class="original" src="" />
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="newsletter-widget text-center align-self-center">
                            <h3>Inicia sesion</h3>
                            <?php
                              if(isset($error)) printMsg($error, "error");
                              if(isset($_GET['loggedOut'])) printMsg("You have logged out succesfully from the system.", "exito");
                              if(isset($_GET['authError'])) printMsg("You are not authorized to access this content.", "error");
                            ?>
                            <form class="form-inline" method="post" action="index.php">
                                <input type="text" name="Correo" placeholder="Coloca tu correo" value= "<?php if(isset($_POST['Correo'])) echo $_POST['Correo']; ?>" required class="form-control" />
                                <input type="password" name="Contraseña" placeholder="contraseña" requiered class="form-control" />

                                <input type="submit" value="Iniciar sesion" name ="sent" class="btn btn-default btn-block" />
                                <br>
                                <p style ="fontfont-size: 10px;">En caso de no tener un cuenta cree una</p>

                            </form>
                            <a type="button" style ="background: #f9ca27 !important;"class="btn btn-warning" href="registro_usr.php" >Registrarse</a>
                          <!--  <a type="button" style ="background: #9CDED5 !important;"class=" btn btn-primary" href="#" >Link</a> -->
                        </div><!-- end newsletter -->
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer" >
            <div class="container" >
                <div class="row" >
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Post Recientes</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="images/blisa.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">5 Blusas de temporada</h5>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="images/vestido.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">5 vestidos mas usados</h5>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 last-item justify-content-between">
                                            <img src="images/vestido.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">Renueva tu estilo</h5>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title">Publicaciones populares</h2>
                            <div class="blog-list-widget">
                                <div class="list-group">
                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="images/blusa2.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">Blusas mas chilas</h5>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 justify-content-between">
                                            <img src="images/vestido.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">Vestidos chulos</h5>
                                        </div>
                                    </a>

                                    <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                        <div class="w-100 last-item justify-content-between">
                                            <img src="images/zapatos.jpg" alt="" class="img-fluid float-left">
                                            <h5 class="mb-1">Zapatos chulos</h5>
                                        </div>
                                    </a>
                                </div>
                            </div><!-- end blog-list -->
                        </div><!-- end widget -->
                    </div><!-- end col -->

                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="widget">
                            <h2 class="widget-title"></h2>
                            <div class="link-widget">
                                
                            </div><!-- end link-widget -->
                        </div><!-- end widget -->
                    </div><!-- end col -->
                </div><!-- end row -->

                <div class="row">
                    <div class="col-md-12 text-center">
                        <br>
                        <br>
                        <!--<div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.</div>-->
                    </div>
                </div>
            </div><!-- end container -->
        </footer><!-- end footer -->

        <div class="dmtop">Scroll to Top</div>
        
    </div><!-- end wrapper -->

    <!-- Core JavaScript
    ================================================== -->
    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animate.js"></script>
    <script src="js/custom.js"></script>

</body>
</html>