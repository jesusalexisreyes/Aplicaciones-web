<?php

$categoria=$_GET['categoria'];



include("conn/connLocalhost.php");
include("includes/utils.php");

// Obtenemos los datos de los usuarios de la BD
$queryGetUsers = "SELECT idproducto, Imagen, Titulo, Precio, Categoria, Stock FROM producto WHERE Categoria =".$categoria;

// Ejecutamos el query
$resQueryGetUsers = mysqli_query($connLocalhost, $queryGetUsers) or trigger_error("There was an error getting the user data... please try again");

// Contamos el número de resultados obtenidos
$totalUsers = mysqli_num_rows($resQueryGetUsers);

// Hacemos fetch del primer resultado
$userDetails = mysqli_fetch_assoc($resQueryGetUsers);




 ?>




<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Site Metas -->
    <title>Blusas</title>
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
</head>
<body>
   
<div class="wrapper">

    <?php include("includes/header.php"); ?>


    <div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Blusas disponibles <small class="hidden-xs-down hidden-sm-down">Encuentra blusas de todo tipo</small></h2>
                </div><!-- end col -->
                <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="#">Paginas</a></li>
                        <li class="breadcrumb-item active">Contactanos</li>
                    </ol>
                  </div><!-- end col -->
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end page-title -->
        




<div class="card-deck">
            <div class="card ">
            <?php do { ?>
                <img src="<?php echo $userDetails['Imagen'] ?>"  class="card-img-top img-fluid" alt="Modelo en blusa blanca">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $userDetails['Titulo']?></h5>
                  
                     <a href="carrito.php?idproducto=<?php echo $userDetails['idproducto'];?> class="btn btn-primary mb-3">Vista rapida</a>
                     <?php } while($userDetails = mysqli_fetch_assoc($resQueryGetUsers)); ?>
                </div>
             </div>
    <?php echo  $categoria; ?>
    <section class="container mb-5 pt-5">
        <div class="card-deck">
            <div class="card ">
            <?php do { ?>
                <img src="<?php echo $userDetails['Imagen'] ?>"  class="card-img-top img-fluid" alt="Modelo en blusa blanca">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $userDetails['Titulo']?></h5>
                  
                     <a href="carrito.php?idproducto=<?php echo $userDetails['idproducto'];?> class="btn btn-primary mb-3">Vista rapida</a>
                     <?php } while($userDetails = mysqli_fetch_assoc($resQueryGetUsers)); ?>
                </div>
             </div>

             <div class="card ">
                <img src="images/blusa_escolar_02.jpg" class="card-img-top img-fluid" alt="...">
                 <div class="card-body text-center">
                    <h5 class="card-title">Blusa escolar</h5>
                    <p class="card-text">Perfecta para la escuela.<br><strong>$499</strong></p>
                    <a href="#" class="btn btn-primary mb-3">Comprar</a>
                </div>  
            </div>

            <div class="card ">
                <img src="images/blusa_blanca_08.jpg" class="card-img-top img-fluid" alt="...">
                    <div class="card-body text-center">
                     <h5 class="card-title">Hombro descubierto</h5>
                     <p class="card-text">Lista para tu cita.<br><strong>$599</strong></p>
                     <a href="#" class="btn btn-primary mb-3">Comprar</a>
                </div>
            </div>
        </div><!-- fin del deck card-->
    </section>
</div>



</body>
</html>