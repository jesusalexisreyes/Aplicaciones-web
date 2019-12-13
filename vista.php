

<?php


if(!isset($_SESSION)) {
  session_start();
  //session_destroy();
}

$idProducto=$_GET['idproducto'];
$idusuario=$_SESSION['usuarioId'];


include("conn/connLocalhost.php");
include("includes/utils.php");

// Obtenemos los datos de los usuarios de la BD COMENS
$queryGetcomens = "SELECT u.Nombre, c.descripcion, c.valoracion
FROM comentario c
INNER JOIN usuario u 
on c.idUsuario = u.idusuario
order by u.nombre";

// Ejecutamos el query
$resQuerycomens = mysqli_query($connLocalhost, $queryGetcomens) or trigger_error("There was an error getting the user data... please try again");

// Contamos el número de resultados obtenidos
$totalcomens = mysqli_num_rows($resQuerycomens);

// Hacemos fetch del primer resultado
$comensdetalles = mysqli_fetch_assoc($resQuerycomens);


// Obtenemos los datos de los usuarios de la BD
$query_producto = "SELECT idproducto, Imagen, Titulo, Descripcion, Precio, Categoria, Stock FROM producto WHERE idproducto =".$idProducto;

// Ejecutamos el query
$resQueryProducto = mysqli_query($connLocalhost, $query_producto) or trigger_error("There was an error getting the user data... please try again");

// Contamos el número de resultados obtenidos
$totalProductos = mysqli_num_rows($resQueryProducto);

// Hacemos fetch del primer resultado
$productoDetalles = mysqli_fetch_assoc($resQueryProducto);

//Jalar los campos de la tarjeta
if(isset($_POST['sent'])) {


if(!isset($error)) {

  $queryVentas = sprintf("INSERT INTO ventas ( idUsuario, idProducto, fecha, total) VALUES ( '%s', '%s','%s', '%s')",

     mysqli_real_escape_string($connLocalhost,trim($_SESSION['usuarioId'])),
     mysqli_real_escape_string($connLocalhost,trim($_GET['idproducto'])),
      mysqli_real_escape_string($connLocalhost,trim(date('d-m-Y H:i:s'))),

     mysqli_real_escape_string($connLocalhost,trim($productoDetalles['Precio']))


  );
      $resQueryVentas = mysqli_query($connLocalhost, $queryVentas) or trigger_error("Error en el registro :()");

      if($resQueryVentas) {


        


      }




  // Definimos el query a ejecutar
  $queryUserAdd = sprintf("INSERT INTO tarjeta ( idUsuario, tarjeta) VALUES ( '%s', '%s')",

      mysqli_real_escape_string($connLocalhost,trim($_SESSION['usuarioId'])),
      mysqli_real_escape_string($connLocalhost,trim($_POST['tarjeta']))


  );




  // Ejecutamos el query y cachamos el resultado
  $resQueryUserAdd = mysqli_query($connLocalhost, $queryUserAdd) or trigger_error("Error en el registro :()");

  // Redireccionamos al usuario si todo salio bien
  if($resQueryUserAdd) {





  }



}




}


if(isset($_GET['enviar'])) {


$queryComentario = sprintf("INSERT INTO comentario (idUsuario, idproducto, descripcion, valoracion, fecha) VALUES ( '%s', '%s','%s', '%s','%s')",

   mysqli_real_escape_string($connLocalhost,trim($_SESSION['usuarioId'])),
   mysqli_real_escape_string($connLocalhost,trim($_GET['idproducto'])),
    mysqli_real_escape_string($connLocalhost,trim($_GET['comentario'])),
     mysqli_real_escape_string($connLocalhost,trim($_GET['count'])),
    mysqli_real_escape_string($connLocalhost,trim(date('Y-m-d')))
  );

echo $queryComentario;
    $resQueryComentario = mysqli_query($connLocalhost, $queryComentario) or trigger_error("Error en el registro :()");

    if($resQueryComentario) {
      header("Location: vista.php?idproducto=".$idProducto);

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
<title>Compras</title>
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
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>




<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">
  <header>
      <div class="container-fluid">
          <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
              <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <a class="navbar-brand" href="marketing-index.html"><img src="images/version/market-logo.png" alt=""></a>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                  <ul class="navbar-nav mr-auto"style=" position: relative; left: 254px;">
                      <li class="nav-item">
                          <a class="nav-link" href="index_usr.php">Inicio</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="categoria.php">Categorias</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="marketing-category.html">Compras</a>
                      </li>

                  </ul>
                  <form class="form-inline " style=" position: absolute; top: 19px; left: 1298px;">
                    <a class="btn btn-outline-success" href="log_out.php" >Cerrar sesion</a>

                  </form>
              </div>
          </nav>
      </div><!-- end container-fluid -->
      </header>

        <div class="page-title db" style="margin-top: auto;">
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

                <img class= "m-5  clearfix " src="<?php echo $productoDetalles['Imagen']; ?>" width= "330px" alt="">

       </div>
    <div class= "col-4 " >

        <h1 class= "text-center"><?php echo $productoDetalles['Titulo']; ?></h1>
        <h4 class= >Descripción: </h4>

        <p  class= " texto "><?php echo $productoDetalles['Descripcion']; ?> </p>


        <h4>Cantidad en stock:<h4>
              <div class="col-sm-8 col-md-9">
                <input type="text" class="form-control" id="input-qty" name="qty" maxlength="5" value="<?php echo $productoDetalles['Stock']; ?>" readonly="readonly" >
              </div>

                    <div class="col-sm-8 col-md-9">


                    </div>
            </div>




    <div class = "col-3  ">


    <div class = "clearfix mt-5 ">

                <div class="sidebar">
                    <div class="widget-no-style">
                        <div class="newsletter-widget text-center align-self-center">
                            <h3>Precio:</h3>
                            <h4 id="nombre3" >$<?php echo $productoDetalles['Precio']; ?></h4>

                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                              Pagar
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ingrese su tarjeta porfavor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">

                                    <form class="form-inline" method="post">

                                      <input type="text" name="tarjeta" placeholder="Coloca tu numero de tarjeta" required class="form-control" />
                                            <h5> Total:</h5>
                                       <h4 id="nombre3" >$<?php echo $productoDetalles['Precio']; ?></h4>

                                        <input type="submit" name="sent" value="Comprar" class="btn btn-default " />

                                    </form>



                                  </div>
                                  <div class="modal-footer">

                                  </div>
                                </div>
                              </div>
                            </div>



                        </div><!-- end newsletter -->





                    </div>
                </div>
        </div>



    </div>
    </div>
     <div>

<br>
<br>


     <div>

                        <div class="col-lg-12">
                            <form class="form-wrapper margen">
                                <h4>Comentarios</h4>
                                <div class="container">

    
                                <form class="asd" action="index.html" method="post">
                 <input hidden name="idproducto" value="<?php echo $idProducto ?>" type="text" class="form-control" placeholder="Titulo del comentario (opcional)">
                 <input type="text" name="count" class="form-control" placeholder="1-10">
                                <input type="text" class="form-control" placeholder="Titulo del comentario (opcional)">
                                <textarea name="comentario"class="form-control" placeholder="Comentario"></textarea>
                                <input type="submit" name="enviar" class="btn btn-primary mb-5" value="Comentar"/>
                            </form>
                            
                        </div>
                    </div>
                    <?php do { ?>
    <div class="card margen"  >                    
                          <div class="card-body text-center">
                              <h5 class="card-title">Nombre del usuario: <?php echo $comensdetalles ['Nombre']?></h5>
                                  <p class="card-text text-left"><strong><?php echo "Comentario: <br/>". $comensdetalles['descripcion'] ?></strong></p>
                                  <p class="card-text text-left"><strong><?php echo "valoracion: <br/>". $comensdetalles['valoracion'] ?></strong></p>
                          </div>
                  </div>
  <?php } while($comensdetalles = mysqli_fetch_assoc($resQuerycomens)); ?>






         </div>
       </div>


                  </div>

                  </body>
