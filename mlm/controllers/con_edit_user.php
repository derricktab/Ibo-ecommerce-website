<?php
include 'model/mod_edit_user.php'; 

class Con_edit_user
{
    
    // -----tour cart
    public function edit_user($user_name ,$first_name, $middle_name, $last_name, $user_email, $phone_number, $id){

        try { 
            $obj1 = new mod_edit_user();
            $message = $obj1->edit_user($user_name ,$first_name, $middle_name, $last_name, $user_email, $phone_number, $id);
            return $message;         
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }
    

    public function username($id){
        
        try {
            $obj1 = new mod_edit_user();
            $result = $obj1->username($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }

    public function firstname($id){
        
        try {
            $obj1 = new mod_edit_user();
            $result = $obj1->firstname($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }

    public function middle_name($id){
        
        try {
            $obj1 = new mod_edit_user();
            $result = $obj1->middle_name($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }

    public function lastname($id){
        
        try {
            $obj1 = new mod_edit_user();
            $result = $obj1->lastname($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }

    public function user_email($id){
        
        try {
            $obj1 = new mod_edit_user();
            $result = $obj1->user_email($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }

    
    public function phone_number($id){
        
        try {
            $obj1 = new mod_edit_user();
            $result = $obj1->phone_number($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }

}
  