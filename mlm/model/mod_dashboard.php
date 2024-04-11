<?php
include 'includes/connectdb.php';

class Mod_dashboard 
{
    // Total user count
    public function users_count(){
        
        try{
            $conn = open_db_connection();   //db_coonection;
            //Select from user table
            $sql = "SELECT COUNT(*) FROM user_tb";
            if($conn->query($sql)== true){
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);
                $total = array_shift($row);
                return $total;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    // Total user count
    public function account_count(){
        
        try{
            $conn = open_db_connection();   //db_coonection;
            //Select from user table
            $sql = "SELECT COUNT(*) FROM user_account_tb";
            if($conn->query($sql)== true){
                $result = $conn->query($sql);
                $row = mysqli_fetch_array($result);
                $total = array_shift($row);
                return $total;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    // Total user count
    public function shopping_allowance(){
        
        try{
            $conn = open_db_connection();   //db_coonection;
            //Select from user table
            $sql = "SELECT SUM(shopping_allowance) AS sum  FROM investment_roi_tb";
            if($conn->query($sql)== true){
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['sum'];
                return $sum;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    // Total user count
    public function education_allowance(){
        
        try{
            $conn = open_db_connection();   //db_coonection;
            //Select from user table
            $sql = "SELECT SUM(education_allowance) AS sum  FROM investment_roi_tb";
            if($conn->query($sql)== true){
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['sum'];
                return $sum;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    public function healthcare_allowance(){
        
        try{
            $conn = open_db_connection();   //db_coonection;
            //Select from user table
            $sql = "SELECT SUM(healthcare_allowance) AS sum  FROM investment_roi_tb";
            if($conn->query($sql)== true){
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['sum'];
                return $sum;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    public function housing_allowance(){
        
        try{
            $conn = open_db_connection();   //db_coonection;
            //Select from user table
            $sql = "SELECT SUM(housing_allowance) AS sum  FROM investment_roi_tb";
            if($conn->query($sql)== true){
                $result = $conn->query($sql);
                $row = mysqli_fetch_assoc($result);
                $sum = $row['sum'];
                return $sum;
            }
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }

}


?>