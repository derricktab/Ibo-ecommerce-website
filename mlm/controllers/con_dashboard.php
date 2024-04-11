<?php

include('model/mod_dashboard.php');

class Con_dashboard
{
    
    public function users_count(){
        
        try{
            $obj = new Mod_dashboard();
            $total = $obj->users_count();
            return $total;
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    public function account_count(){
        
        try{
            $obj = new Mod_dashboard();
            $total = $obj->account_count();
            return $total;
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    public function shopping_allowance(){
        
        try{
            $obj = new Mod_dashboard();
            $total = $obj->shopping_allowance();
            return $total;
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    public function education_allowance(){
        
        try{
            $obj = new Mod_dashboard();
            $total = $obj->education_allowance();
            return $total;
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    public function healthcare_allowance(){
        
        try{
            $obj = new Mod_dashboard();
            $total = $obj->healthcare_allowance();
            return $total;
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }


    public function housing_allowance(){
        
        try{
            $obj = new Mod_dashboard();
            $total = $obj->housing_allowance();
            return $total;
        } catch (Exception $e){
            echo 'message'.$e->getMessage();
            return false;
        }
    }



}


?>