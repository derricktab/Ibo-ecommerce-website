<?php
include 'model/mod_edit_stages.php'; 

class Con_edit_stages
{
    
    // -----tour cart
    public function edit_stages($stages, $id){

        try { 
            $obj1 = new mod_edit_stages();
            $message = $obj1->edit_stages($stages, $id);
            return $message;         
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }
    

    public function stage_title($stage_id){
        
        try {
            $obj1 = new mod_edit_stages();
            $result = $obj1->stage_title($stage_id);
            return $result;
        }catch(Exception $e) {   
            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

        }
    }


}
  