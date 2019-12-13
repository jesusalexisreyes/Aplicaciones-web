

<?php
include("../conn/connLocalhost.php");
$salida="";

$query ="SELECT ventas.idventas, usuario.Correo, producto.Titulo, ventas.fecha, ventas.total
from ventas, usuario, producto
where usuario.idUsuario = ventas.idUsuario and producto.idproducto= ventas.idproducto ";


  if(isset($_POST['consulta'])){
  $q= $connLocalhost->real_escape_string($_POST['consulta']);
  $query="SELECT ventas.idventas, usuario.Correo, producto.Titulo, ventas.fecha, ventas.total
  from ventas, usuario, producto
  WHERE usuario.idUsuario = ventas.idUsuario and producto.idproducto = ventas.idproducto and Correo LIKE '%$q%'";
}

$resultado = $connLocalhost->query($query);
if ($resultado->num_rows>0) {

  $salida.="<table id='table' class='tabla_datos table table-striped'>
                <thead class='table-info'>
                <tr>
                <td>Id</td>
                <td>Correo</td>
                <td>Titulo</td>
                <td>Fecha</td>
                <td>Total</td>


                </tr>
                </thead>
                <tbtbody>";
                while ($fila = $resultado->fetch_assoc()) {
                  $id = $fila['Correo'];
                  $salida.=

                      "<tr>
                        <td name= 'id'>".$fila['idventas']."</td>

                        <td>".$fila['Correo']."</td>
                        <td>".$fila['Titulo']."</td>
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
