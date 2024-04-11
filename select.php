<?php include "dbcon.php" ?>



<?php  
 if(isset($_POST["product_id"])){  
     $product_id = $_POST['product_id'];
     
  $output = "";
  $output .=" <p>The Product ID is </p> ";

   echo $output;

 }  

 
 ?>