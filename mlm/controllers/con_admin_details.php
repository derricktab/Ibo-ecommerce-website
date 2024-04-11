<?php
 include 'model/mod_admin_details.php'; 

class Con_admin_details
{
    
    public function admin_details(){
        
        try {
            $obj = new Mod_admin_details();
            $result = $obj->admin_details();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   
            
                    $message .= '
                        <tr>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["firstname"].'</td>
                            <td>'.$row["lastname"].'</td>
                            <td>'.$row["user_email"].'</td>
                            <td>2011/04/25</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="EDIT" href="edit_admin.php?id='.$row['row_id'].'"<i class="fa fa-gear fa-lg"></i></a>
                                &nbsp;&nbsp;
                                <a data-toggle="tooltip" data-placement="top" title="DELETE" href="delete_admin.php?id='.$row['row_id'].'"<i class="fa fa-trash fa-lg"></i></a>
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