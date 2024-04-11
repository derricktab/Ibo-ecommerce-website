<?php
 include 'model/mod_transaction_details.php'; 

class Con_transaction_details
{
    
    public function transaction_details(){
        
        try {
            $obj = new Mod_transaction_details();
            $result = $obj->transaction_details();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   
            
                    $message .= '
                        <tr>
                            <td>'.$row["amount"].'</td>
                            <td>'.$row["trans_type"].'</td>
                            <td>'.$row["trans_desc"].'</td>
                            <td>'.$row["wallet_type"].'</td>
                            <td>'.$row["approved_by"].'</td>
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