<?php
include 'includes/connectdb.php';

class Mod_txn_payout {
    
    public function txn_payout(){
        
        try {
            // Selecting From vacation_package_tb
            $conn= open_db_connection();
            $sql = "SELECT * FROM txn_pay_out_tb WHERE pay_out_status='N' ORDER BY pay_out_id DESC" ;
            if($conn->query($sql)== true){
                $result =$conn->query($sql);
                return $result;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }   
    }
    
    
    public function spool_status($box){

        try { 
            $spool_by = $_SESSION['username'];
            
            //db connection
            $conn= open_db_connection();
            
            // Select last payment batch no
            $sql = "SELECT payment_batch_no FROM payment_code_batch_tb ";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $payment_batch_no = $row["payment_batch_no"];
            
             foreach ($box as $value) {
                 
                $sql = "UPDATE txn_pay_out_tb SET payment_batch_no='$payment_batch_no', spool_date=now(), spool_by='$spool_by', pay_out_status='S' WHERE pay_out_id='$value'";
    

                 if ($conn->query($sql) === TRUE) {
                     $_SESSION["SuccessMessage"]= "Epin Status Changed Successfully";
                     echo '<script>window.location.replace("payout.php");</script>';
                 } else {
                     echo "Error deleting record: " . $conn->error;
                 }
            }
            
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }
    

}