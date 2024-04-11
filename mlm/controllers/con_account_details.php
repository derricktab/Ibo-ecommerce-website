<?php
 include 'model/mod_account_details.php'; 

class Con_account_details
{
    
    public function account_details(){
        
        try {
            $obj = new Mod_account_details();
            $result = $obj->account_details();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   
            
                    $message .= '
                        <tr>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["registration_code"].'</td>
                            <td>'.$row["stage"].'</td>
                            <td>'.$row["referrer_id"].'</td>
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