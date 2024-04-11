<?php
include 'includes/connectdb.php';

class Mod_maintenance
{

public function maintenance(){
        
        try{      
        $conn= open_db_connection();
        $sql = "SELECT * FROM maintenance_tb;" ;
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

?>