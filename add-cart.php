<?php

include "dbcon.php";

// Getting the received values and storing them in variables
$quantity = htmlentities($_POST["quant"][1], ENT_QUOTES, "UTF-8");
$product_id = htmlentities($_POST["prod_id"], ENT_QUOTES, "UTF-8");
 
// Gettin the product related to the product id from the database
$result = mysqli_query($con, "SELECT * FROM products WHERE prod_id = '$product_id'");
$product = mysqli_fetch_array($result);

// Fetching image
$image_object = mysqli_query($con, "SELECT * FROM  prod_images WHERE prod_id = '$product_id'");
$prod_image = mysqli_fetch_array($image_object);

// calculating price and total
$product_price = $product['prod_price'];
$total_price = $quantity * $product_price;

// creating an array of values to be included in the cookie of the cart
$cart_array = array(
    "product_id" => $product_id,
    "quantity" => $quantity,
    "product_name" => $product['prod_name'],
    "product_price" => $product['prod_price'],
    "total_price" => $total_price,
    "product_image" => $prod_image['image_name']
);

// checking if the cookie is having some values in it
$cart = isset($_COOKIE["cart"])?  $_COOKIE["cart"] : "[]";

$cart = json_decode($cart);

// updating the cookie
array_push($cart, $cart_array);
setcookie("cart", json_encode($cart));
$success_mesage = true;

// redirecting to another location
header("Location: product-details.php?p=$product_id&status=$success_mesage" );
 
?>