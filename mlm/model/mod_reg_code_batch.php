<?php
include 'includes/connectdb.php';

class Mod_reg_code_batch {
    
    public function reg_code_batch(){
        
        try {
            // Selecting 
            $conn= open_db_connection();
            $sql = "SELECT * FROM registration_code_tb" ;
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