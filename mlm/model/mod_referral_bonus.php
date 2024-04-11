<?php
include 'includes/connectdb.php';

class Mod_referral_bonus {
    
    public function referral_bonus(){
        
        try {
            
            $conn= open_db_connection();
            $sql = "SELECT * FROM transactions_tb WHERE trans_type='REF'" ;
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