<?php
 include 'model/mod_approved_payout.php'; 

class Con_aproved_payout
{
    
    public function approved_payout(){
        
        try {
            $obj = new mod_approved_payout();
            $result = $obj->approved_payout();
            
            if($result->num_rows > 0){
                $message = "";
                $idno = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   $idno++;
            
                    $message .= '
                        <tr>
                            <td>'.$idno.'</td>
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