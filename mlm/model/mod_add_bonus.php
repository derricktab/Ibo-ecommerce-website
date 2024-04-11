<?php
    include 'includes/connectdb.php';
    include 'includes/passenc.php';

class Mod_add_bonus {
    
    
     public function add_bonus($bonus_name, $amount){
         
         try {
            $conn= open_db_connection();
            mysqli_autocommit($conn,FALSE);

            $sql = "INSERT INTO general_bonus_tb (bonus_name, bonus_amount)VALUES(?, ?)";

            if (!$stmt = $conn->prepare($sql)){
                return "Prepare Error2: (" . $conn->errno . ") " . $conn->error;
            }
             
            if (!$stmt->bind_param("si",$bonus_name ,$amount)){
                return "Binding Parameter Error: (" . $conn->errno .") " . $conn->error."Issue";
            }
        
            if(!$stmt->execute()){
                return 'Execute Error: (' . $stmt->errno . ') ' . $stmt->error;
            }
        
            mysqli_commit($conn);
        
            if ($stmt->affected_rows>0){
                $stmt->close();
                $conn->close();
             
                $_SESSION["SuccessMessage"]= "Bonus Have Been Added Successfully";
                header("Location:dashboard.php");
             
                exit;
            } else {
                $stmt->close();
                $conn->close();
                return "Error Occured";
            }
        }
        catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();
        }

     }
    
    
    
  
}