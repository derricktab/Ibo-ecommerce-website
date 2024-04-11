<?php
include 'model/mod_edit_bank_list.php'; 

class Con_edit_bank_list
{
    
    // -----tour cart
    public function edit_bank_list($bank_name ,$bank_code, $id){

        try { 
            $obj1 = new mod_edit_bank_list();
            $message = $obj1->edit_bank_list($bank_name ,$bank_code, $id);
            return $message;         
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }
    

    public function bank_name($id){
        
        try {
            $obj1 = new mod_edit_bank_list();
            $result = $obj1->bank_name($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }
    
    
    public function bank_code($id){
        
        try {
            $obj1 = new mod_edit_bank_list();
            $result = $obj1->bank_code($id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }


}
  