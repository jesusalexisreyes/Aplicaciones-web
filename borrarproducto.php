<?php 
include("conn/connLocalhost.php");

$id = $_GET['id'];

if($id > 0){

  // Check record exists
  $checkRecord = mysqli_query($connLocalhost,"SELECT * FROM producto WHERE idproducto=".$id);
  $totalrows = mysqli_num_rows($checkRecord);

  if($totalrows > 0){
    // Delete record
    $query = "DELETE FROM producto WHERE idproducto=".$id;
    mysqli_query($connLocalhost,$query);
    header("Location: productos.php");
    exit();

  }
}

exit();

?>