<?php
 include 'model/mod_txn_payout.php'; 

class Con_txn_payout
{
    
    public function txn_payout(){
        
        try {
            $obj = new Mod_txn_payout();
            $result = $obj->txn_payout();
            
            if($result->num_rows > 0){
                $message = "";
                $idno = 0;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   $idno++;
            
                    $message .= '
                        <tr>
                            <td><input type="checkbox" id="selectAllBoxes" name="spoolBox[]" value="'.$row["pay_out_id"].'">
                            </td>
                            <td>'.$idno.'</td>
                            <td>'.$row["account_number"].'</td>
                            <td>'.$row["tra_amt"].'</td>
                            <td>'.$row["remarks"].'</td>
                            <td>'.$row["bank_code"].'</td>
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
    
        public function spool_status($box){

            try { 
                $obj1 = new Mod_txn_payout();
                $message = $obj1->spool_status($box); 
                return $message;
            }
              catch(Exception $e) {
                echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
                return 'Message: ' .$e->getMessage();
            }
        }
    
    
}

?>