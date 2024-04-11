<?php
 include "dbcon.php";

if(isset($_GET['p'])){
$product_id = mysqli_real_escape_string($con, $_GET["p"]);
 
$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
$cart = json_decode($cart, true);
$cart_items_counter = count($cart);


$new_cart = array();
foreach ($cart as $keys=>$values){

    if($values["product_id"] !== $product_id){
        array_push($new_cart, $values);
    }

setcookie("cart", json_encode($new_cart));
header("Location: cart.php");
 
}



}


?>