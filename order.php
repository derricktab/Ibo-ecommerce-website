<?php
include "dbcon.php";


if(isset($_POST['submit'])){
    $firstname = htmlentities($_POST['firstname']);
    $lastname = htmlentities($_POST['lastname']);
    $email = htmlentities($_POST['email']);
    $phonenumber = htmlentities($_POST['phonenumber']);
    $country = htmlentities($_POST['country']);
    $city = htmlentities($_POST['city']);
    $address = htmlentities($_POST['address']);
    
    // CHECK IF THE USER ALSO WANTS TO CREATE AN ACCOUNT
    if(isset($_POST['password'])){
    $password = htmlentities($_POST['password1']);
    $confirm_password = htmlentities($_POST['password2']);
    }

    








}









?>