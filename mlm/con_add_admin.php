<?php
include 'model/mod_add_admin.php';

class Con_add_admin
{   
    // -----add hotel
    public function add_admin($user_name ,$first_name, $middle_name, $last_name, $user_email, $password){

        try { 
            $obj1 = new mod_add_admin();
            $message = $obj1->add_admin($user_name ,$first_name, $middle_name, $last_name, $user_email, $password); 
            return $message;
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }
    
    
    
    
}

?>