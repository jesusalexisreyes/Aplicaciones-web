<?php 
include("conn/connLocalhost.php");

$id = $_GET['id'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($connLocalhost,"SELECT * FROM usuario WHERE idUsuario=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM usuario WHERE idUsuario=".$id;
    mysqli_query($connLocalhost,$query);
    header("Location: index_admin.php");
    exit();

  }
}

exit();

?>