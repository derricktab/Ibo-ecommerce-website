<?php
include 'model/mod_add_bonus.php';

class Con_add_bonus
{   
    // -----add hotel
    public function add_bonus($bonus_name, $amount){

        try { 
            $obj1 = new mod_add_bonus();
            $message = $obj1->add_bonus($bonus_name, $amount); 
            return $message;
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }
    
    
    
    
}

?>