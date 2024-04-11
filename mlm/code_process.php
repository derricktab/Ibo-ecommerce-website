<?php
include 'includes/connectdb.php';
session_start();
//include 'includes/functions.php';
	
	if (isset($_POST['quantity'])) {
		$quantity = $_POST['quantity'];

		$regenerated_by = $_SESSION['username'];

		//database connection
		$conn= open_db_connection();

		// Select last batch code
		$sql = "SELECT batch_no FROM reg_code_batch_tb ";
             $result = $conn->query($sql);
             $row = $result->fetch_assoc();
             $batch_no = $row["batch_no"];
             

		for ($i=1; $i <= $quantity ; $i++) { 

			// Generate random number
			$txn_ref = date('jY'). intval( "0" . rand(1,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9) . rand(0,9)); 
            
            
            
			// inserting into db
			$sql = "INSERT IGNORE INTO registration_code_tb (registration_code, generated_by, date_generated, used_status, batch_no)
			VALUES ('$txn_ref', '$regenerated_by', now(), 'N', '$batch_no')";
            
			$conn->query($sql);
		}	

		
		if ($conn->query($sql)) {

			//increase the batch_code for next batch
			$next_batch_code = $batch_no + 1;

             $sql = "UPDATE reg_code_batch_tb SET batch_no='$next_batch_code'";
			$conn->query($sql);

			if ($conn->query($sql) === TRUE) {
                $_SESSION["SuccessMessage"]= $quantity . " Epin Generated  Successfully. The batch number is " . $batch_no;
		   		 echo '<script>window.location.replace("reg_code_details.php");</script>';
		   	}else {
		    	echo "Error: " . $sql . "<br>" . $conn->error;
			}

		} else {
		    echo "Error: " . $sql . "<br>" . $conn->error;
		}

	}
        
        
        
        
    
    