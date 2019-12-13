


<?php
if(!isset($_SESSION)) {
  session_start();
//session_destroy();

if(!isset($_SESSION['usuarioId'])) header('Location: index_usr.php?authError=true');


if ($_SESSION['usuarioNivel']==1)
  header("Location: index_admin.php?login=true");

}
include("conn/connLocalhost.php");

include("includes/utils.php");

function eliminar(){

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

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->


              <script type="text/javascript">

            function MM_jumpMenuGo(objId,targ,restore){ //v9.0
              var selObj = null;  with (document) {
              if (getElementById) selObj = getElementById(objId);
              if (selObj) eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");
              if (restore) selObj.selectedIndex=0; }
            }
          </script>

</head>
<body>

    <div id="wrapper">
        <header class="market-header header">
          <?php include("includes/header_login_usr.php"); ?>

        <div class="page-title db">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2> Bienvenido <small class="hidden-xs-down hidden-sm-down">Usted a iniciado sesion. </small></h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>

                        </ol>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

        <section class="section lb">

        </section>

      <?php  include("includes/footer_login_usr.php"); ?>

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
