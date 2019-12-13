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
                                <a class="nav-link" href="index_usr.php">Usuarios</a>
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


                    <div class="tabla-usuarios">
                        <?php include("tabla_ventas.php"); ?>
                    </div>
                </div>



               

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
            <script type="text/javascript" src="js/compras.js"></script>

</body>

</html>