<?php
include 'includes/connectdb.php';

class Mod_approved_payout {
    
    public function approved_payout(){
        
        try {
            // Selecting From vacation_package_tb
            $conn= open_db_connection();
            $sql = "SELECT * FROM txn_pay_out_tb WHERE pay_out_status='Y' ORDER BY pay_out_id DESC" ;
            if($conn->query($sql)== true){
                $result =$conn->query($sql);
                return $result;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }   
    }
    
}