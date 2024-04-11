<?php
 include 'model/mod_spooled_request.php'; 

class Con_spooled_request
{
    
    public function spooled_request(){
        
        try {
            $obj = new Mod_spooled_request();
            $result = $obj->spooled_request();
            
            if($result->num_rows > 0){
                $message = "";
                $idno = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   $idno++;
            
                    $message .= '
                        <tr>
                            <td><input type="checkbox" id="selectAllBoxes" name="spoolBox[]" value="'.$row["pay_out_id"].'">
                            </td>
                            <td>'.$row["tra_amt"].'</td>
                            <td>'.$row["account_number"].'</td>
                            <td>'.$row["payment_batch_no"].'</td>
                            <td>'.$row["spool_date"].'</td>
                            <td>'.$row["spool_by"].'</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="SPOOL" href="spool_process.php?id='.$row['pay_out_id'].'"<i class="fa fa-check-circle fa-lg"></i></a>
                                &nbsp;&nbsp;
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