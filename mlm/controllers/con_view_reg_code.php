<?php
include 'model/mod_view_reg_code.php';

class con_view_reg_code {
	
	public function view_reg_code(){
        
        try {
            $obj1 = new Mod_view_reg_code();
            $result = $obj1->view_reg_code();
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }

}