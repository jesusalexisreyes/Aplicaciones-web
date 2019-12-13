<?php


if (!isset($_SESSION)) {
    session_start();
    //session_destroy();




    if (!isset($_SESSION['usuarioId'])) header('Location: index_admin.php?authError=true');
}
include("conn/connLocalhost.php");

include("includes/utils.php");

function eliminar()
{ }

if (isset($_POST['sents'])) {
    // Validacion de cajas vacias
    foreach ($_POST as $calzon => $caca) {
        if ($caca == "" && $calzon != "nombre") $error[] = "El campo $calzon es obligatorio";
    }


    // Validación de email existente
    // Primero determinamos que solo se ejecute la validación cuando tenemos la certeza de que se capturó un email
    if (isset($_POST['correo']) && isset($_POST['correo']) != "") {
        $queryValidateEmail = sprintf(
            "SELECT idUsuario FROM usuario WHERE correo = '%s'",
            mysqli_real_escape_string($connLocalhost, trim($_POST['correo']))
        );

        // Ejecutamos el Query y obtenemos un recordset debido a que el query es de tipo SELECT
        $resQueryValidateEmail = mysqli_query($connLocalhost, $queryValidateEmail) or trigger_error("error_msg");

        // Contamos cuantos registros fueron devueltos por la consulta anterior, si obtenemos un numero distinto de 0 quiere decir que el correo ya está siendo utilizado
        if (mysqli_num_rows($resQueryValidateEmail) != 0) {
            $error[] = "El correo esta ocupado";
        }
    }

    // Inserción del nuevo usuario en la base de datos, solamente se ejecutará cuando NO EXISTAN ERRORES
    if (!isset($error)) {
        // Definimos el query a ejecutar
        $queryUseredit = sprintf(
            "UPDATE usuario
            SET nivel='%s', Nombre='%s', Correo='%s', Contraseña='%s', Direccion='%s'
            WHERE idusuario= '%s'",
            mysqli_real_escape_string($connLocalhost, trim($_POST['nivel'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['nombre'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['correo'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['contraseña'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['direccion'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['bookId']))

        );

        // Ejecutamos el query y cachamos el resultado
        $queryUseredit = mysqli_query($connLocalhost, $queryUseredit) or trigger_error("The user insert query failed...");

        // Redireccionamos al usuario si todo salio bien
        if ($queryUseredit) { }
    }
}

if (isset($_POST['sent'])) {

    // Validacion de cajas vacias
    foreach ($_POST as $calzon => $caca) {
        if ($caca == "" && $calzon != "nombre") $error[] = "El campo $calzon es obligatorio";
    }

    // Validacion de password coincidentes
    if ($_POST['contraseña'] != $_POST['contraseña1']) $error[] = "La contraseña no coincide";

    // Validación de email existente
    // Primero determinamos que solo se ejecute la validación cuando tenemos la certeza de que se capturó un email
    if (isset($_POST['correo']) && isset($_POST['correo']) != "") {
        $queryValidateEmail = sprintf(
            "SELECT idUsuario FROM usuario WHERE correo = '%s'",
            mysqli_real_escape_string($connLocalhost, trim($_POST['correo']))
        );

        // Ejecutamos el Query y obtenemos un recordset debido a que el query es de tipo SELECT
        $resQueryValidateEmail = mysqli_query($connLocalhost, $queryValidateEmail) or trigger_error("error_msg");

        // Contamos cuantos registros fueron devueltos por la consulta anterior, si obtenemos un numero distinto de 0 quiere decir que el correo ya está siendo utilizado
        if (mysqli_num_rows($resQueryValidateEmail) != 0) {
            $error[] = "El correo esta ocupado";
        }
    }

    // Inserción del nuevo usuario en la base de datos, solamente se ejecutará cuando NO EXISTAN ERRORES
    if (!isset($error)) {
        // Definimos el query a ejecutar
        $queryUserAdd = sprintf(
            "INSERT INTO usuario (nivel, nombre, correo, contraseña, direccion) VALUES ( '%s', '%s', '%s', '%s', '%s')",
            mysqli_real_escape_string($connLocalhost, trim($_POST['nivel'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['nombre'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['correo'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['contraseña'])),
            mysqli_real_escape_string($connLocalhost, trim($_POST['direccion']))

        );

        // Ejecutamos el query y cachamos el resultado
        $resQueryUserAdd = mysqli_query($connLocalhost, $queryUserAdd) or trigger_error("The user insert query failed...");

        // Redireccionamos al usuario si todo salio bien
        if ($resQueryUserAdd) { }
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


<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/util.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<script type="text/javascript">
    function MM_jumpMenuGo(objId, targ, restore) { //v9.0
        var selObj = null;
        with(document) {
            if (getElementById) selObj = getElementById(objId);
            if (selObj) eval(targ + ".location='" + selObj.options[selObj.selectedIndex].value + "'");
            if (restore) selObj.selectedIndex = 0;
        }
    }
</script>

</head>

<body>

<div id="wrapper">
        <header class="market-header header">
            <div class="container-fluid">
                <nav style="height: 122px;" class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" href="marketing-index.html"><img src="images/version/market-logo.png" alt=""></a>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <ul class="navbar-nav mr-auto" style=" top: -35px;position: relative; left: 254px;">


                            <li class="nav-item">
                                <a class="nav-link" href="comprasrealizadas.php">Compras Realizadas</a>
                            </li>
                        </ul>
                        <form class="form-inline" style=" position: absolute; top: 33px; left: 1298px;">
                            <a class="btn btn-outline-success" href="log_out.php">Cerrar sesion</a>
                        </form>
                    </div>
                </nav>
            </div><!-- end container-fluid -->
        </header><!-- end market-header -->



        <div class="contenido-arriba">

            <div id="registro-tabla">
                <div class="col-lg-4 col-md-12">







                    <div class="newsletter-widget text-center align-self-center" style="    right: -773px;">


                        <h3>Registro de usuarios</h3>




                        <?php
                        if (isset($error)) { ?>
                            <div style="background: #F5A9A9;" class="alert alert-warning alert-dismissable">
                            <?php
                                printMsg($error, "error");
                                echo "  </div>";
                            }

                            ?>

                            <?php if (isset($resQueryUserAdd)) {
                                ?>
                                <div class="alert alert-success alert-dismissible fade show">
                                    <strong>Success!</strong> Your message has been sent successfully.
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                </div>
                            <?php } ?>

                            <form class="form-inline" method="post">
                                <input type="email" name="correo" placeholder="correo" required class="form-control" />

                                <input type="text" name="nombre" placeholder="Nombre completo" required class="form-control" />

                                <input type="password" name="contraseña" placeholder="contraseña" requiered class="form-control" />
                                <input type="password" name="contraseña1" placeholder="repite contraseña" requiered class="form-control" />

                                <input type="text" name="direccion" placeholder="Direccion" required class="form-control" />

                                <select required class="form-control" name="nivel">
                                    <option value=1>Administrador</option>
                                    <option value=2>Ditribuidor</option>
                                    <option value=3>Usuario</option>
                                </select>


                                <input type="submit" name="sent" value="Registrar" class="btn btn-default " />

                            </form>

                            </div><!-- end newsletter -->
                            <div class="modal hide" id="addBookDialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <!-- cuerpo del modal -->
                                        <div class="modal-body">
                                            <div class="newsletter-widget text-center align-self-center" ;">


                                                <h3>Editar usuario</h3>

                                    


                                                <?php
                                                if (isset($error)) { ?>
                                                    <div style="background: #F5A9A9;" class="alert alert-warning alert-dismissable">
                                                    <?php
                                                        printMsg($error, "error");
                                                        echo " ";
                                                    }

                                                    ?>

                                                    <?php if (isset($resQueryUserAdd)) {
                                                        ?>
                                                        <div class="alert alert-success alert-dismissible fade show">
                                                            <strong>Success!</strong> Your message has been sent successfully.
                                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                                        </div>
                                                    <?php } ?>

                                                    <form class="form-inline" method="post">
                                                    <input hidden type="text" name="bookId" id="bookId" value="" />

                                                        <input type="email" name="correo" placeholder="correo" required class="form-control" />





                                                        <input type="text" name="nombre" placeholder="Nombre completo" required class="form-control" />

                                                        <input type="text" name="contraseña" placeholder="contraseña" requiered class="form-control" />


                                                        <input type="text" name="direccion" placeholder="Direccion" required class="form-control" />

                                                        <select required class="form-control" name="nivel">
                                                            <option value=1>Administrador</option>
                                                            <option value=2>Ditribuidor</option>
                                                            <option value=3>Usuario</option>
                                                        </select>


                                                        <input type="submit" name="sents" value="Registrar" class="btn btn-default " />
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                                                    </form>

                                                    </div>
                                            </div>
                                        </div>
                                        <!-- fin del cuerpo del modal -->
                                    </div>
                                </div>
                            </div>



                    </div>
                    <div class="tabla-usuarios">
                        <?php include("tabla_usuarios.php"); ?>
                    </div>
                </div>



                <footer class="footer" style="position: relative; ">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="widget">
                                    <h2 class="widget-title">Recent Posts</h2>
                                    <div class="blog-list-widget">
                                        <div class="list-group">
                                            <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="upload/small_04.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">5 Beautiful buildings you need to before dying</h5>
                                                    <small>12 Jan, 2016</small>
                                                </div>
                                            </a>

                                            <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="upload/small_05.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">Let's make an introduction for creative life</h5>
                                                    <small>11 Jan, 2016</small>
                                                </div>
                                            </a>

                                            <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 last-item justify-content-between">
                                                    <img src="upload/small_06.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">Did you see the most beautiful sea in the world?</h5>
                                                    <small>07 Jan, 2016</small>
                                                </div>
                                            </a>
                                        </div>
                                    </div><!-- end blog-list -->
                                </div><!-- end widget -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="widget">
                                    <h2 class="widget-title">Popular Posts</h2>
                                    <div class="blog-list-widget">
                                        <div class="list-group">
                                            <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="upload/small_01.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">Banana-chip chocolate cake recipe with customs</h5>
                                                    <span class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </a>

                                            <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 justify-content-between">
                                                    <img src="upload/small_02.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">10 practical ways to choose organic vegetables</h5>
                                                    <span class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </a>

                                            <a href="marketing-single.html" class="list-group-item list-group-item-action flex-column align-items-start">
                                                <div class="w-100 last-item justify-content-between">
                                                    <img src="upload/small_03.jpg" alt="" class="img-fluid float-left">
                                                    <h5 class="mb-1">We are making homemade ravioli, nice and good</h5>
                                                    <span class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </span>
                                                </div>
                                            </a>
                                        </div>
                                    </div><!-- end blog-list -->
                                </div><!-- end widget -->
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="widget">
                                    <h2 class="widget-title">Popular Categories</h2>
                                    <div class="link-widget">
                                        <ul>
                                            <li><a href="#">Marketing <span>(21)</span></a></li>
                                            <li><a href="#">SEO Service <span>(15)</span></a></li>
                                            <li><a href="#">Digital Agency <span>(31)</span></a></li>
                                            <li><a href="#">Make Money <span>(22)</span></a></li>
                                            <li><a href="#">Blogging <span>(66)</span></a></li>
                                            <li><a href="#">Entertaintment <span>(11)</span></a></li>
                                            <li><a href="#">Video Tuts <span>(87)</span></a></li>
                                        </ul>
                                    </div><!-- end link-widget -->
                                </div><!-- end widget -->
                            </div><!-- end col -->
                        </div><!-- end row -->

                        <div class="row">
                            <div class="col-md-12 text-center">
                                <br>
                                <br>
                                <div class="copyright">&copy; Markedia. Design: <a href="http://html.design">HTML Design</a>.</div>
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

            <!--===============================================================================================-->
            <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
            <!--===============================================================================================-->
            <script src="vendor/bootstrap/js/popper.js"></script>
            <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
            <!--===============================================================================================-->
            <script src="vendor/select2/select2.min.js"></script>
            <!--===============================================================================================-->
            <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
            <script>
                $('.js-pscroll').each(function() {
                    var ps = new PerfectScrollbar(this);

                    $(window).on('resize', function() {
                        ps.update();
                    })
                });
            </script>

            <script type="text/javascript" src="js/jquery.min.js"></script>
            <script type="text/javascript" src="js/main.js"></script>

</body>

</html>