<?php
include 'includes/connectdb.php';

class Mod_stage_exit_bonus {
    
    public function stage_exit_bonus(){
        
        try {
            
            $conn= open_db_connection();
            $sql = "SELECT * FROM transactions_tb WHERE trans_type='SEB'" ;
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