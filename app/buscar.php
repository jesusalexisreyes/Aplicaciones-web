<?php
include("../conn/connLocalhost.php");

$salida="";

$query ="SELECT * FROM usuario";


  if(isset($_POST['consulta'])){

  $q= $connLocalhost->real_escape_string($_POST['consulta']);
  $queery="SELECT idUsuario, Nivel, Nombre, Correo, Contraseña, Direccion FROM usuario
  WHERE Nivel LIKE '%$q%'  OR Nombre LIKE '%$q%'  OR Correo LIKE '%$q%' OR Contraseña LIKE '%$q%'  OR Direccion LIKE '$q'";
}

$resultado = $connLocalhost->query($query);

if ($resultado->num_rows>0) {
  $salida.="<table id='table' class='tabla_datos table table-striped'>
                <thead class='table-info'>
                <tr>
                <td>Id</td>
                <td>Nivel</td>
                <td>Nombe</td>
                <td>Correo</td>
                <td>Contraseña</td>
                <td>Direccion</td>

                </tr>
                </thead>
                <tbtbody>";
                while ($fila = $resultado->fetch_assoc()) {

                  $salida.=

                      "<tr>
                        <td name= 'fleliminar'>".$fila['idUsuario']."</td>

                        <td>".$fila['Nivel']."</td>
                        <td>".$fila['Nombre']."</td>
                        <td>".$fila['Correo']."</td>
                        <td>".$fila['Contraseña']."</td>
                        <td>".$fila['Direccion']."</td>
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
