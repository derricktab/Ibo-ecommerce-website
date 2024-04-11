<?php
include 'includes/connectdb.php';
session_start();
include 'includes/functions.php';

    $conn= open_db_connection();
    if(isset($_GET["id"])){
        //id
        $id=$_GET["id"];
        
        //check_table
        $sql = "SELECT used_status FROM registration_code_tb WHERE reg_code_row_id='$id'";
        $result =$conn->query($sql);
        $row = $result->fetch_assoc();

        if($row['used_status'] == 'N'){
            $Query = "UPDATE registration_code_tb SET used_status='S'
            WHERE reg_code_row_id='$id'";
            if ($conn->query($Query) === TRUE) {
                $_SESSION["SuccessMessage"]= "User Has Been Sold";
                header("Location:reg_code_details.php");
                echo '<script>window.location.replace("reg_code_details.php");</script>';
            }
        } else if ($row['used_status'] == 'S'){
            $Query = "UPDATE registration_code_tb SET used_status='N'
            WHERE reg_code_row_id='$id'";
            if ($conn->query($Query) === TRUE) {
                $_SESSION["SuccessMessage"]= "User Has Not Been Sold";
                echo '<script>window.location.replace("reg_code_details.php");</script>';
            }
        }
        
    }
        
        
        
        
    
    