<?php
 include 'model/mod_user_details.php'; 

class Con_user_details
{
    
    public function user_details(){
        
        try {
            $obj = new Mod_user_details();
            $result = $obj->user_details();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
            
                        if ($row['activation_status'] == 'Y') {
                            $status = "<span class='badge badge-success badge-lg'>Active user</span>";
                        } else {
                            $status = "<span class='badge badge-warning badge-lg'>Inactive User</span>";
                        }
            
                    $message .= '
                        <tr>
                            <td>'.$row["username"].'</td>
                            <td>'.$row["firstname"].'</td>
                            <td>'.$row["lastname"].'</td>
                            <td>'.$row["user_email"].'</td>
                            <td>'.$row["state"].'</td>
                            <td>'.$status.'</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="EDIT" href="edit_user.php?id='.$row['row_id'].'"<i class="fa fa-gear fa-lg"></i></a>
                                &nbsp;&nbsp;
                                <a data-toggle="tooltip" data-placement="top" title="DISABLE/ENABLE" href="user_status.php?id='.$row['row_id'].'"<i class="fa fa-check-circle fa-lg"></i></a>
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