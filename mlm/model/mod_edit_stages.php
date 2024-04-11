<?php
include 'includes/connectdb.php';

class Mod_edit_stages
{
    
    public function edit_stages($stages, $id){
         
         try {
            $conn= open_db_connection();
            mysqli_autocommit($conn,FALSE);
 
            $sql = "UPDATE stages_tb SET stage_title=?  WHERE stage_id='$id'  ";
            

            if (!$stmt = $conn->prepare($sql)){
                return "Prepare Error2: (" . $conn->errno . ") " . $conn->error;
            }
             
            if (!$stmt->bind_param("s",$stages)){
                return "Binding Parameter Error: (" . $conn->errno .") " . $conn->error."Issue";
            }
        
            if(!$stmt->execute()){
                return 'Execute Error: (' . $stmt->errno . ') ' . $stmt->error;
            }
        
            mysqli_commit($conn);
        
            if ($stmt->affected_rows>0){
                $stmt->close();
                $conn->close();

                $_SESSION["SuccessMessage"]= "Stage updated Successfully";
                header("Location:stages.php");
             
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
    
    
    public function stage_title($stage_id){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM stages_tb 
                WHERE stage_id ='$stage_id' ";
               if($conn->query($sql)== true){
                    $result =$conn->query($sql);
                    if ($result->num_rows > 0){
                        while ($row = $result->fetch_assoc()){
                            $Stage_title = $row['stage_title'];
                            return $Stage_title;
                        }
                    }
               }
            
         } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

}