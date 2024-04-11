<?php
    // Including the db_connection
    include 'includes/connectdb.php';
    include 'includes/passenc.php';

    class mod_login
    {
        public function login($email, $password){
            
            try{
                
                $password = encryptdata($password);
                
                // db connection
                $conn = open_db_connection();
 
                $sql = "SELECT * FROM admins
                WHERE username='$email' AND password='$password' " ;
                $result =$conn->query($sql);
                $row = mysqli_fetch_array($result);
                    
                if ($email != $row['user_email'] && $password != $row['password']){
                    $_SESSION['ErrorMessage']="Your Email and Password Dont Match";
                    header("Location: index.php");
                    exit;
                } else {
                    // Saving user details in session
                    $_SESSION['admin_id'] = $row['row_id'];
                    $_SESSION['firstname'] = $row['firstname'];
                    $_SESSION['lastname'] = $row['lastname'];
                    $_SESSION['username'] = $row['username'];
                    $_SESSION['email'] = $row['user_email'];
                   // $_SESSION['role'] = $row['role'];
                    
                    
                    $_SESSION["SuccessMessage"]= "Welcome Back";
                        header("Location:dashboard.php");
                        exit;
                } 
                
            } catch(Exception $e) {
                echo '<script type="text/javascript">alert("'.$e->getMessage();'");</script>';
                return 'Message: ' .$e->getMessage();
            }
        }
        
    }


?>