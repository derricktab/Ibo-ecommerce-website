<?php
 include 'model/mod_signup_allowance.php'; 

class Con_signup_allowance
{
    
    public function signup_allowance(){
        
        try {
            $obj = new mod_signup_allowance();
            $result = $obj->signup_allowance();
            
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