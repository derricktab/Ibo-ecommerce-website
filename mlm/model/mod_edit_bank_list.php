 <?php
include 'includes/connectdb.php';

class Mod_edit_bank_list
{
    
    public function edit_bank_list($bank_name ,$bank_code, $id){
         
         try {
            $conn= open_db_connection();
            mysqli_autocommit($conn,FALSE);
 
            $sql = "UPDATE bank_list_tb SET bankname=?,bank_code=?  WHERE row_id='$id'  ";
            

            if (!$stmt = $conn->prepare($sql)){
                return "Prepare Error2: (" . $conn->errno . ") " . $conn->error;
            }
             
            if (!$stmt->bind_param("ss",$bank_name ,$bank_code)){
                return "Binding Parameter Error: (" . $conn->errno .") " . $conn->error."Issue";
            }
        
            if(!$stmt->execute()){
                return 'Execute Error: (' . $stmt->errno . ') ' . $stmt->error;
            }
        
            mysqli_commit($conn);
        
            if ($stmt->affected_rows>0){
                $stmt->close();
                $conn->close();

                $_SESSION["SuccessMessage"]= "Bank List updated Successfully";
                echo '<script>window.location.replace("bank_list.php");</script>';
             
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
    
    
    public function bank_name($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM bank_list_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $bankname = $row['bankname'];
                            return $bankname;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

    public function bank_code($id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM bank_list_tb 
                WHERE row_id ='$id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $bank_code = $row['bank_code'];
                            return $bank_code;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


}