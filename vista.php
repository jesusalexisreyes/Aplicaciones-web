<?php

$idproducto=1;
$idproductof=1;



include("conn/connLocalhost.php");
include("includes/utils.php");

// Obtenemos los datos de los usuarios de la BD
$queryGetComents = "SELECT descripcion, fecha, idUsuario FROM comentario WHERE idproducto =".$idproducto;
$queryGetUsers = "SELECT idproducto, Imagen, Titulo, Precio, Categoria, Stock, Descripcion FROM producto WHERE idproducto =".$idproductof;

// Ejecutamos el query
$resQueryGetComments = mysqli_query($connLocalhost, $queryGetComents) or trigger_error("There was an error getting the user data... please try again");
$resQueryGetUsers = mysqli_query($connLocalhost, $queryGetUsers) or trigger_error("There was an error getting the user data... please try again");

// Contamos el número de resultados obtenidos
$totalComments = mysqli_num_rows($resQueryGetComments);
$totalUsers = mysqli_num_rows($resQueryGetUsers);
// Hacemos fetch del primer resultado
$commentsDetails = mysqli_fetch_assoc($resQueryGetComments);
$userDetails = mysqli_fetch_assoc($resQueryGetUsers);





 ?>





<!DOCTYPE html>
<html lang="en">

<!-- Basic -->
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Site Metas -->
<title>Markedia - Marketing Blog Template</title>
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
<?php include("includes/header.php");  ?>
        <!-- end market-header -->
       

        <div class="page-title db">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <h2> Articulo <small class="hidden-xs-down hidden-sm-down">Datos del articulo </small>
                        </h2>
                    </div><!-- end col -->
                    <div class="col-lg-4 col-md-4 col-sm-12 hidden-xs-down hidden-sm-down">

                        </ol>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div><!-- end page-title -->

<div class="container mt-5">

<div class ="row justify-content-around">
    <div class= "col-4 ">

    <?php do { ?>


              
                <img class= "m-5  clearfix " src=<?php echo $userDetails['Imagen']?> width= "330px" alt="Blusa con botones">
               
       </div>        
    <div class= "col-4 " >
     
        <h1 class= "text-center"><?php echo $userDetails ['Titulo']?><h1>
        <h4 class= >Descripción: </h4>

        <p  class= " texto "><?php echo $userDetails ['Descripcion']?></p>
      

        <h4>Cantidad en stock:<?php echo $userDetails ['Stock']?><h4>
              
            </div>
      
        


    <div class = "col-3  ">
    
    
    <div class = "clearfix mt-5 ">
                
                <div class="sidebar">
                    <div class="widget-no-style">
                        <div class="newsletter-widget text-center align-self-center">
                            <h3>Precio:</h3>
                            <h4><?php echo "$".$userDetails['Precio']?></h4>

                            <?php } while($usersDetails = mysqli_fetch_assoc($resQueryGetUsers)); ?>
                            <form class="form-inline" method="post">
                                
                                <button class= "btn btn-primary" >Pagar</button>
                            </form>
                        </div><!-- end newsletter -->
                    </div>
                </div> 
        </div>
        
        
        
    </div>
    </div>
     <div>

<br>
<br>

<br>

<div class="comment-section mt-5">
                        <h3>Comentarios</h3>
                        <hr class="ml-0" />
                        <div class="media pt-5">
                            <div class="card mr-4">
                                <img src="assets/images/comment-user1.png" alt="" class="card-img">
                                <div class="card-img-overlay">
                                </div>
                            </div>


                            <?php do { ?>
                            <div class="media-body">
                                <div class="row">
                                    <div class="col text-left">
                                        <h4><?php echo $commentsDetails['idUsuario']?></h4>
                                    </div>
                                    <div class="col text-right">
                                        <p class="my-0">
                                            <span><?php echo $commentsDetails['fecha']?> </span> 
                                        </p>
                                    </div>
                                </div>
                                <p class ="texto">
                                <?php echo $commentsDetails['descripcion']?>
                                </p>
                                </div>
                            </div>
                        </div>
                     <div>
                     <?php } while($commentsDetails = mysqli_fetch_assoc($resQueryGetComments)); ?>

                        <div class="col-lg-12">
                            <form class="form-wrapper margen">
                                <h4>Comentarios</h4>
                                <textarea class="form-control" placeholder="Comentario"></textarea>
                                <button type="button" class="btn btn-primary mb-5">Comentar<i class="fa fa-envelope-open-o"></i></button>
                            </form>
                        </div>
                    </div>
         


     

       

         </div>