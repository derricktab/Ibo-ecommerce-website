<?php
 include 'model/mod_reg_code_details.php'; 

class Con_reg_code_details
{
    
    public function reg_code_details(){
        
        try {
            $obj = new Mod_reg_code_details();
            $result = $obj->reg_code_details();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   
                   //  // For used_status
                   // $status = ($row['used_status'] == 'Y') ? '<span class="badge badge-success badge-lg">Already Used</span>' : '<span class="badge badge-warning badge-lg">Not Used</span>' ;

                        if ($row['used_status'] == 'Y') {
                            $status = "<span class='badge badge-success badge-lg'>Already Used</span>";
                        } elseif ($row['used_status'] == 'S') {
                            $status = "<span class='badge badge-info badge-lg'> Sold</span>";
                        } else {
                            $status = "<span class='badge badge-warning badge-lg'>Not Used</span>";
                        }
                    
                    $message .= '
                        <tr>
                            <td><input type="checkbox" id="selectAllBoxes" name="deleteBox[]" value="'.$row["reg_code_row_id"].'">
                            </td>
                            <td>'.$row["date_generated"].'</td>
                            <td>'.$row["registration_code"].'</td>
                            <td>'.$row["generated_by"].'</td>
                            <td>'.$status.'</td>
                            <td>'.$row["used_by"].'</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="SELL" class="" href="approve_code.php?id='.$row['reg_code_row_id'].'"><i class="fa fa-check-circle fa-lg"></i></a>
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



    public function code_status($box){

        try { 
            $obj1 = new Mod_reg_code_details();
            $message = $obj1->code_status($box); 
            return $message;
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }



}

?>