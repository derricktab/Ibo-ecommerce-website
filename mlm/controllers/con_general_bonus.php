<?php
 include 'model/mod_general_bonus.php'; 

class Con_general_bonus
{
    
    public function general_bonus(){
        
        try {
            $obj = new Mod_general_bonus();
            $result = $obj->general_bonus();
            
            if($result->num_rows > 0){
                $message = "";
                $idno= 0;
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   $idno++;
            
                    $message .= '
                        <tr>
                            <td>'.$idno.'</td>
                            <td>'.$row["bonus_name"].'</td>
                            <td>$'.$row["bonus_amount"].'</td>
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