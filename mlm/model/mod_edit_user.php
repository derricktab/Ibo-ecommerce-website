<?php
include 'includes/connectdb.php';

class Mod_edit_user
{
    
    public function edit_user($user_name ,$first_name, $middle_name, $last_name, $user_email, $phone_number, $id){
         
         try {
            $conn= open_db_connection();
            mysqli_autocommit($conn,FALSE);
 
            $sql = "UPDATE user_tb SET username=?,firstname=?,middle_name=?,lastname=?,user_email=?,phone_number=?  WHERE row_id='$id'  ";
            

            if (!$stmt = $conn->prepare($sql)){
                return "Prepare Error2: (" . $conn->errno . ") " . $conn->error;
            }
             
            if (!$stmt->bind_param("ssssss",$user_name ,$first_name, $middle_name, $last_name, $user_email, $phone_number)){
                return "Binding Parameter Error: (" . $conn->errno .") " . $conn->error."Issue";
            }
        
            if(!$stmt->execute()){
                return 'Execute Error: (' . $stmt->errno . ') ' . $stmt->error;
            }
        
            mysqli_commit($conn);
        
            if ($stmt->affected_rows>0){
                $stmt->close();
                $conn->close();

                $_SESSION["SuccessMessage"]= "User updated Successfully";
                echo '<script>window.location.replace("user_details.php");</script>';
             
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
    
    
    public function username($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM user_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $username = $row['username'];
                            return $username;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

    public function firstname($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM user_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $firstname = $row['firstname'];
                            return $firstname;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

    public function middle_name($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM user_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $middle_name = $row['middle_name'];
                            return $middle_name;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

    public function lastname($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM user_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $lastname = $row['lastname'];
                            return $lastname;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

    public function user_email($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM user_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $user_email = $row['user_email'];
                            return $user_email;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }
    
    
    public function phone_number($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM user_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $phone_number = $row['phone_number'];
                            return $phone_number;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

}