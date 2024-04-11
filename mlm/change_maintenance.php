<?php
include 'includes/connectdb.php';
session_start();
include 'includes/functions.php';

    $conn= open_db_connection();
    
        //check_table
        $sql = "SELECT status FROM maintenance_tb ";
        $result =$conn->query($sql);
        $row = $result->fetch_assoc();

        if($row['status'] == 'N'){
            $Query = "UPDATE maintenance_tb SET status='Y'";
            if ($conn->query($Query) === TRUE) {
                $_SESSION["SuccessMessage"]= "User Has Been Sold";
                echo '<script>window.location.replace("maintenance.php");</script>';
            }
        } else if ($row['status'] == 'Y'){
            $Query = "UPDATE maintenance_tb SET status='N'";
            if ($conn->query($Query) === TRUE) {
                $_SESSION["SuccessMessage"]= "User Has Not Been Sold";
                echo '<script>window.location.replace("maintenance.php");</script>';
            }
        }
       
        
    
    