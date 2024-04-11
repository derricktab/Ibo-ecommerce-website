<?php
 include 'model/mod_payout.php'; 

class Con_payout
{
    
    public function payout(){
        
        try {
            $obj = new Mod_payout();
            $result = $obj->payout();
            
            if($result->num_rows > 0){
                $message = "";
                
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {

                        // if ($row['used_status'] == 'Y') {
                        //     $status = "<span class='badge badge-success badge-lg'>Already Used</span>";
                        // } elseif ($row['used_status'] == 'S') {
                        //     $status = "<span class='badge badge-info badge-lg'> Sold</span>";
                        // } else {
                        //     $status = "<span class='badge badge-warning badge-lg'>Not Used</span>";
                        // }
                    
                    $message .= '
                        <tr>
                            <td>'.$row["account_number"].'</td>
                            <td>'.$row["tra_amt"].'</td>
                            <td>'.$row["remarks"].'</td>
                            <td>'.$row['spool_status'].'</td>
                            <td>'.$row["bank_code"].'</td>
                            <td>
                                <a data-toggle="tooltip" data-placement="top" title="SELL" class="" href="approve_code.php?id='.$row['pay_out_id'].'"><i class="fa fa-check-circle fa-lg"></i></a>
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