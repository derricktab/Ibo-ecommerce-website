<?php
    include 'includes/connectdb.php';
    include 'includes/passenc.php';

class Mod_add_admin {
    
    
     public function add_admin($user_name ,$first_name, $middle_name, $last_name, $user_email, $password){
         
         try {
            $conn= open_db_connection();
            mysqli_autocommit($conn,FALSE);

            // Password encryption ;
            $passwordenc = encryptdata($password);
 
            $sql = "INSERT INTO admin_tb (username, firstname, middle_name, lastname, user_email, password)VALUES(?, ?, ?, ?, ?, ?)";
             
            if (!$stmt = $conn->prepare($sql)){
                return "Prepare Error2: (" . $conn->errno . ") " . $conn->error;
            }
             
            if (!$stmt->bind_param("ssssss",$user_name ,$first_name, $middle_name, $last_name, $user_email, $passwordenc)){
                return "Binding Parameter Error: (" . $conn->errno .") " . $conn->error."Issue";
            }
        
            if(!$stmt->execute()){
                return 'Execute Error: (' . $stmt->errno . ') ' . $stmt->error;
            }
        
            mysqli_commit($conn);
        
            if ($stmt->affected_rows>0){
                $stmt->close();
                $conn->close();
             
                $_SESSION["SuccessMessage"]= "Admin Have Been Added Successfully";
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