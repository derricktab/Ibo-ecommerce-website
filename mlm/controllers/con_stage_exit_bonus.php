<?php
 include 'model/mod_stage_exit_bonus.php'; 

class Con_stage_exit_bonus
{
    
    public function stage_exit_bonus(){
        
        try {
            $obj = new mod_stage_exit_bonus();
            $result = $obj->stage_exit_bonus();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   
            
                    $message .= '
                        <tr>
                            <td>'.$row["amount"].'</td>
                            <td>'.$row["trans_desc"].'</td>
                            <td>'.$row["trans_date"].'</td>
                            <td>'.$row["time_approved"].'</td>
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