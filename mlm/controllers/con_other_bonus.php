<?php
 include 'model/mod_other_bonus.php'; 

class Con_other_bonus
{
    
    public function other_bonus(){
        
        try {
            $obj = new Mod_other_bonus();
            $result = $obj->other_bonus();
            
            if($result->num_rows > 0){
                $message = "";
                $idno= 0;
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   $idno++;
            
                    $message .= '
                        <tr>
                            <td>'.$idno.'</td>
                            <td>'.$row["bonus_title"].'</td>
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