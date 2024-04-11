<?php
include 'includes/connectdb.php';

class Mod_signup_allowance {
    
    public function signup_allowance(){
        
        try {
            
            $conn= open_db_connection();
            $sql = "SELECT * FROM transactions_tb WHERE trans_type='SUA'" ;
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