<?php
include 'includes/connectdb.php';

class Mod_payout {
    
    public function payout(){
        
        try {
            // Selecting From vacation_package_tb
            $conn= open_db_connection();
            $sql = "SELECT * FROM txn_pay_out_tb" ;
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