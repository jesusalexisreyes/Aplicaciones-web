
<?php

$idproducto=$_GET['idproducto'];


 echo $idproducto; ?>

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
<?php include("includes/header.php"); ?>

<div class="page-title db">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <h2>Vestidos disponibles <small class="hidden-xs-down hidden-sm-down">Encuentra tu nuevo vestido</small></h2>
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


    <br>

    <h2>Items en el carrito</h2>

    <!--- Tabla donde aparaceran los articulos enviados al carritos--->
   <table class = "table table-light table-bordered col-6">
       <tbody>
         <tr>
            <th width= "40%">Descripcion</th>
            <th width= "15%">Cantidad</th>
            <th width= "20%">Precio</th>
            <th width= "20%">Total</th>
            <th width= "5%">--</th>
       </tr>
       <tr>
            <td width= "40%">Blusa 1</td>
            <td width= "15%">1</td>
            <td width= "20%">$300</td>
            <td width= "20%">$200</td>
            <td width= "5%"><button class= "btn btn-danger"type="button" >Eliminar</button></td>
       </tr>
       <tr>
            <td width= "40%">Blusa 2</td>
            <td width= "15%">1</td>
            <td width= "20%">$300</td>
            <td width= "20%">$200</td>
            <td width= "5%"><button class= "btn btn-danger"type="button" >Eliminar</button></td>
       </tr>
       </tbody>

   </table>
   <!--- Fin de la tabla --->


<div class="container ">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                        <div class="sidebar">
                            <div class="widget-no-style">
                                <div class="newsletter-widget text-center align-self-center">
                                    <h3>Subtotal:</h3>
                                    <p>$2323</p>
                                    <form class="form-inline" method="post">
                                        <input type="text" name="email" placeholder="Add your email here.." required class="form-control" />
                                        <input type="submit" value="Pagar" class="btn btn-default btn-block" />
                                    </form>
                                </div><!-- end newsletter -->
                            </div>










</body>

<html>
