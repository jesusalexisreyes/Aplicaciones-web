

<?php
include("../conn/connLocalhost.php");
$salida="";

$query ="SELECT * FROM producto";


  if(isset($_POST['consulta'])){
  $q= $connLocalhost->real_escape_string($_POST['consulta']);
  $query="SELECT idUsuario, Nivel, Nombre, Correo, Contraseña, Direccion FROM usuario
  WHERE Nivel LIKE '%$q%'  OR Nombre LIKE '%$q%'  OR Correo LIKE '%$q%' OR Contraseña LIKE '%$q%'  OR Direccion LIKE '%$q%'";
}

$resultado = $connLocalhost->query($query);

if ($resultado->num_rows>0) {

  $salida.="<table id='table' class='tabla_datos table table-striped'>
                <thead class='table-info'>
                <tr>
                <td>Id</td>
                <td>Imagen</td>
                <td>Titulo</td>
                <td>Descripcion</td>

                </tr>
                </thead>
                <tbtbody>";
                while ($fila = $resultado->fetch_assoc()) {
                  $id = $fila['idproducto'];
                  $salida.=

                      "<tr>
                        <td name= 'id'>".$fila['idproducto']."</td>

                        <td>".$fila['Imagen']."</td>
                        <td>".$fila['Titulo']."</td>
                        <td>".$fila['Descripcion']."</td>
                        <td><a class=btn btn-primary href='borrarproducto.php?id=".$fila['idproducto']."'>Borrar &nbsp;</a>
                        <td><button title='Add this item' type=button data-id=".$fila['idproducto']." href=#addBookDialog class='open-AddBookDialog btn btn-primary' data-toggle=modal >                    
                        Editar
                      </button></
                        </td>
                        

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
