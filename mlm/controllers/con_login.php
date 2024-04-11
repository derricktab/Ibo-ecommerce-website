<?php
    // Include login model
    include 'model/mod_login.php';

    class Con_login
    {   
    
        public function login($email, $password){

            try { 
                $obj1 = new mod_login();
                $message = $obj1->login($email, $password); 
                return $message;
            }
              catch(Exception $e) {
                echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
                return 'Message: ' .$e->getMessage();
            }
        }


    }

?>