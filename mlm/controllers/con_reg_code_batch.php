<?php
 include 'model/mod_reg_code_batch.php'; 

class Con_reg_code_batch
{
    
    public function reg_code_batch(){
        
        try {
            $obj = new Mod_reg_code_batch();
            $result = $obj->reg_code_batch();
            
            if($result->num_rows > 0){
                $message = "";
                $idno=0;
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   $idno++;
            
                    $message .= '
                        <tr>
                            <td>'.$row["batch_no"].'</td>
                            <td>'.$row["date_generated"].'</td>
                            <td>'.$row["generated_by"].'</td>
                            
                        </tr>
                        
                    ';
                    
                ;
            }
            
               return $message;
                    }
                    else
                    {
                        $message = "<p>No result found</p>";
                            return $message;
                    }
            }
             catch(Exception $e) {   

            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

            }

        }
}

?>