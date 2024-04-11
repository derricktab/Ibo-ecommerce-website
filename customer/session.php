<?php

//Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    if (!isset($_SESSION['customer_id']) || (trim($_SESSION['customer_id']) == '')) {
    header("location: /ibo/login.php");
    exit();
    }
    else{
        $customer_id = $_SESSION['customer_id'];
    }
?>
