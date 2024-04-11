<?php
include 'includes/connectdb.php';

class Mod_admin_details {
    
    public function admin_details(){
        
        try {
            // Selecting From vacation_package_tb
            $conn= open_db_connection();
            $sql = "SELECT * FROM admin_tb;" ;
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