<?php
 include 'model/mod_referral_bonus.php'; 

class Con_referral_bonus
{
    
    public function referral_bonus(){
        
        try {
            $obj = new Mod_referral_bonus();
            $result = $obj->referral_bonus();
            
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