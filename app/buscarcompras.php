

<?php
include("../conn/connLocalhost.php");
$salida="";

$query ="SELECT * FROM ventas";


  if(isset($_POST['consulta'])){
  $q= $connLocalhost->real_escape_string($_POST['consulta']);
  $query="SELECT idventas, idUsuario, idproducto, fecha, total FROM usuario
  WHERE Nivel LIKE '%$q%'  OR Nombre LIKE '%$q%'  OR Correo LIKE '%$q%' OR Contraseña LIKE '%$q%'";
}

$resultado = $connLocalhost->query($query);

if ($resultado->num_rows>0) {

  $salida.="<table id='table' class='tabla_datos table table-striped'>
                <thead class='table-info'>
                <tr>
                <td>Id</td>
                <td>Idusuario</td>
                <td>Idproducto</td>
                <td>Fecha</td>
                <td>Total</td>


                </tr>
                </thead>
                <tbtbody>";
                while ($fila = $resultado->fetch_assoc()) {
                  $id = $fila['idUsuario'];
                  $salida.=

                      "<tr>
                        <td name= 'id'>".$fila['idventas']."</td>

                        <td>".$fila['idUsuario']."</td>
                        <td>".$fila['idproducto']."</td>
                        <td>".$fila['fecha']."</td>
                        <td>".$fila['total']."</td>
                        

<form method='post' >

                        </tr>
                        </form>";

                        }
                $salida.="</tbody></table>";
}else{
$salida.="No hay datos";

}
echo $salida;

$connLocalhost->close();

 ?>
