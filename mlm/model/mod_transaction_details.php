<?php
include 'includes/connectdb.php';

class Mod_transaction_details {
    
    public function transaction_details(){
        
        try {
            
            $conn= open_db_connection();
            $sql = "SELECT * FROM transactions_tb;" ;
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