<?php
include 'includes/connectdb.php';

class Mod_reg_code_details {
    
    public function reg_code_details(){
        
        try {
            // Selecting From vacation_package_tb
            $conn= open_db_connection();
            $sql = "SELECT * FROM registration_code_tb ORDER BY date_generated asc;" ;
            if($conn->query($sql)== true){
                $result =$conn->query($sql);
                return $result;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }   
    }
    
    
    
    
    public function code_status($box){

        try { 
             foreach ($box as $value) {
                 
             $conn= open_db_connection();
                
            $sql = "UPDATE registration_code_tb SET used_status='Y' WHERE reg_code_row_id='$value'";

             if ($conn->query($sql) === TRUE) {
                 $_SESSION["SuccessMessage"]= "Epin Status Changed Successfully";
                 echo '<script>window.location.replace("reg_code_details.php");</script>';
             } else {
                 echo "Error deleting record: " . $conn->error;
             }
         }
            
        }
          catch(Exception $e) {
            echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
            return 'Message: ' .$e->getMessage();
        }
    }
    
    // foreach ($box as $value) {
        //     // echo "<ul><li>".$value."</li></ul>";
        //     $conn= open_db_connection();
        // $sql = "DELETE FROM registration_code_tb WHERE reg_code_row_id='$value' ";

        //     if ($conn->query($sql) === TRUE) {
        //         $_SESSION["SuccessMessage"]= "admin Deleted Successfully";
        //         header("Location:dashboard.php");
        //     } else {
        //         echo "Error deleting record: " . $conn->error;
        //     }
        // }
    

}