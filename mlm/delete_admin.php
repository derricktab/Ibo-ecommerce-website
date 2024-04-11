<?php
include 'includes/connectdb.php';
session_start();
include 'includes/functions.php';

    $conn= open_db_connection();

    if(isset($_GET["id"])){
        $id=$_GET["id"];
        // sql to delete a record
        $sql = "DELETE FROM admin_tb WHERE row_id='$id' ";

        if ($conn->query($sql) === TRUE) {
            $_SESSION["SuccessMessage"]= "admin Deleted Successfully";
            header("Location:admin_details.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }