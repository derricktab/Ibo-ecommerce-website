<?php
include 'includes/connectdb.php';

class Mod_view_reg_code {
    
    public function view_reg_code(){
        
        try {
            // Selecting From vacation_package_tb
            $conn= open_db_connection();
            $sql = "SELECT MAX(registration_code) AS registration_code FROM registration_code_tb" ;
            $result = $conn->query($sql);
             $row = $result->fetch_assoc();
             $last_id = $row["registration_code"];
             return $last_id;
            
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }   
    }
    

}