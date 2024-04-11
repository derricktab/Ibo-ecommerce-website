<?php
 include 'model/mod_view_stages.php'; 

class Con_view_stages
{
    
    public function view_stages(){
        
        try {
            $obj = new mod_view_stages();
            $result = $obj->view_stages();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
                    $message .= '
                        <tr>
                            <td>'.$row["stage_id"].'</td>
                            <td>'.$row["stage_title"].'</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="EDIT" href="edit_stages.php?stage_id='.$row['stage_id'].'"<i class="fa fa-gear fa-lg"></i></a>
                                
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