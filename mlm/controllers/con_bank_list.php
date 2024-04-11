<?php
 include 'model/mod_bank_list.php'; 

class Con_bank_list
{
    
    public function bank_list(){
        
        try {
            $obj = new Mod_bank_list();
            $result = $obj->bank_list();
            
            if($result->num_rows > 0){
                $message = "";
                $idno=0;
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                $idno++;
                    
                    $message .= '
                        <tr>
                            <td>'.$idno.'</td>
                            <td>'.$row["bankname"].'</td>
                            <td>'.$row["bank_code"].'</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="EDIT" href="edit_bank_list.php?id='.$row['row_id'].'"<i class="fa fa-gear fa-lg"></i></a>
                            </td>
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