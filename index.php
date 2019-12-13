<?php

// Iniciamos o retomamos la sesión

if(!isset($_SESSION)) {
  session_start();
  //session_destroy();

if($_SESSION !=null) {


if ($_SESSION['usuarioNivel']==1) {
  header("Location: index_admin.php?login=true");
}if ($_SESSION['usuarioNivel']==2) {
  header("Location: index_usr.php?login=true");
}if ($_SESSION['usuarioNivel']==3) {
  header("Location: index_usr.php?login=true");
}
}
 }

// Incluimos la conexión a la BD
include("conn/connLocalhost.php");
include("includes/utils.php");

// Validamos que el formulario se haya enviado
if(isset($_POST['sent'])) {
  // validamos campos vacios
  foreach ($_POST as $calzon => $caca) {
    if($caca == "") $error[] = "El campo $calzon es necesario";
  }

  // Continuamos con la validación siempre y cuando estemos libres de errores
  if(!isset($error)) {
    // Armamos la consulta con datos sanitizados
    $queryLoginUser = sprintf("SELECT idUsuario, Nivel, Nombre, Correo,Direccion FROM usuario WHERE Correo = '%s' AND Contraseña = '%s'",
        mysqli_real_escape_string($connLocalhost, trim($_POST['Correo'])),
        mysqli_real_escape_string($connLocalhost, trim($_POST['Contraseña']))
    );

    // Ejecutamos el query
    $resQueryLoginUser = mysqli_query($connLocalhost, $queryLoginUser) or trigger_error("Algo esta fallando");

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
  header("Location: index_usr.php?login=true");
}


    }
    else {
      $error[] = "Las credenciales son incorrectas..... intentelo de nuevo!";
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
<?php include("includes/header_logout.php"); ?>
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
                              if(isset($_GET['authError'])) printMsg("No tiene persmiso para estar aqui.", "error");
                            ?>
                            <form class="form-inline" method="post" action="index.php">
                                <input type="text" name="Correo" placeholder="Coloca tu correo" value= "<?php if(isset($_POST['Correo'])) echo $_POST['Correo']; ?>" required class="form-control" />
                                <input type="password" name="Contraseña" placeholder="contraseña" requiered class="form-control" />

                                <input type="submit" value="Iniciar sesion" name ="sent" class="btn btn-default btn-block" />
                                <br>
                                <p style ="fontfont-size: 10px;">En caso de no tener un cuenta cree una</p>

                            </form>
                            <a type="button" class="bottone_reg " href="registro_usr.php">
                              Registrarme
                            </a>                          <!--  <a type="button" style ="background: #9CDED5 !important;"class=" btn btn-primary" href="#" >Link</a> -->
                        </div><!-- end newsletter -->
                    </div>
                </div>
            </div>
        </section>

<?php include("includes/footer_logout.php"); ?>


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
