<?php
include 'includes/connectdb.php';
session_start();
include 'includes/functions.php';
	
	if (isset($_GET['id'])) {
		$id = $_GET['id'];

		//database connection
		$conn= open_db_connection();

		// Select last activation status
		$sql = "SELECT activation_status FROM user_tb ";
             $result = $conn->query($sql);
             $row = $result->fetch_assoc();
             $status = $row["activation_status"];
            	

		
		if ($status == "N") {

             $sql1 = "UPDATE user_tb SET activation_status='Y' WHERE row_id='$id'";
			$conn->query($sql1);
            if ($conn->query($sql1) === TRUE) {
                $_SESSION["SuccessMessage"]= " User Status updated Successfully";
		   		 echo '<script>window.location.replace("user_details.php");</script>';
                exit;
		   	}

		}
        
        if ($status == "Y"){
            $sql = "UPDATE user_tb SET activation_status='N' WHERE row_id='$id'";
			$conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                $_SESSION["SuccessMessage"]= "User Status  updated Successfully";
		   		 echo '<script>window.location.replace("user_details.php");</script>';
                exit;
            }
            
        } 

	}
        
        
        
        
    
    