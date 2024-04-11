<?php
include 'includes/connectdb.php';

class Mod_bank_list {
    
    public function bank_list(){
        
        try {
            // Selecting From vacation_package_tb
            $conn= open_db_connection();
            $sql = "SELECT * FROM bank_list_tb;" ;
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