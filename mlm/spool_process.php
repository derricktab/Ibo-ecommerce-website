<?php
include 'includes/connectdb.php';
session_start();
include 'includes/functions.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $spool_by = $_SESSION['username'];
    
    // database connection
    $conn = open_db_connection();
    
    // Select last payment batch no
    $sql = "SELECT payment_batch_no FROM payment_code_batch_tb ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $payment_batch_no = $row["payment_batch_no"];
    
    echo $payment_batch_no;
    
    $sql = "UPDATE txn_pay_out_tb SET payment_batch_no='$payment_batch_no', spool_date=now(), spool_by='$spool_by' WHERE pay_out_id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        
        //increase the batch_code for next batch
        $next_batch_code = $payment_batch_no + 1;
        
        
        $sql = "UPDATE payment_code_batch_tb SET payment_batch_no='$next_batch_code'";
			$conn->query($sql);

			if ($conn->query($sql) === TRUE) {
                $_SESSION["SuccessMessage"]= "Request have been spooled successfully";
                echo '<script>window.location.replace("payout.php");</script>';
		   	} else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            } 
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
} 