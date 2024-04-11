<?php
include 'model/mod_maintenance.php'; 

class Con_maintenance
{
    

    public function maintenance(){
        
        try {
            $obj1 = new mod_maintenance();
            $result = $obj1->maintenance();
                $message = "";

                $row = mysqli_fetch_assoc($result);
                   
                   if ($row['status'] == "Y") {
                        $show = "currently On Maintenace";
                        $color = "warning";
                    } 

                    if($row['status'] == "N") {
                        $show = "Not On Maintenance";
                        $color = "info";
                    }
                
            
                    $message .= '
                        
                        <span class="badge badge-'.$color.' badge-lg">'.$show.'</span>
                        
                    ';
                    
                ;
            
               return $message;
                    
            }
             catch(Exception $e) {   

            echo 'Message: ' .$e->getMessage();
            return $e->getMessage();

            }

        }

}

?>