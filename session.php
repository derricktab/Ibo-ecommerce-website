<?php

//Start session
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header("location: /ibo/login.php");
    exit();
    }
else{
    
    $session_id=$_SESSION['id'];


}

    // if (!isset($_SESSION['customer_id']) || (trim($_SESSION['customer_id']) == '')) {
    // header("location: /ibo/login.php");
    // exit();
    // }
    // else{
    //     $customer_id = $_SESSION['customer_id'];
    // }
?>
