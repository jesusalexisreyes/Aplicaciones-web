<?php
if(isset($_GET['id']) && $_GET['id'] !== ''){
    echo $_GET['id'];
  $product_id = $_GET['id'];
  echo $product_id;
} else {
  echo "failed";
}
?>