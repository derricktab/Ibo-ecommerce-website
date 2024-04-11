<?php
include 'includes/connectdb.php';

class Mod_other_bonus {
    
    public function other_bonus(){
        
        try {
            
            $conn= open_db_connection();
            $sql = "SELECT * FROM other_bonus_tb;" ;
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