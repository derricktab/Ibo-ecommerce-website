<?php session_start(); ?>
<?php include "header.php" ?>

<?php include('../dbcon.php'); ?>

<?php
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: dashboard/");
  exit;
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter the username.";
    } else{
        $username = htmlentities(trim($_POST["username"]), ENT_QUOTES, "UTF-8");
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = htmlentities(trim($_POST["password"]), ENT_QUOTES, "UTF-8" );
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT admin_id, username, password FROM admins WHERE username = ?";
        
        if($stmt = mysqli_prepare($con, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["admin_id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: dashboard/");
                        } else{
                            // Display an error message if password is not valid
                            $errorMsg = "The password and username do not match";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $errorMsg = "The Password and username do not match";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($con);
}
?>



<style>

body{
  background: url("../img/bg2.jpg") !important;
  background-repeat: none;
  background-size: cover;
}

</style>

<!-- <link rel="stylesheet" href="style1.css"> -->
<title>Admin Login | IBO </title> 
<link rel="stylesheet" href="../old-style.css">
 


<section>

<div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 form-wrapper m-2">
<br>
  <form action="" method="POST" >
          <?php
              if (isset($errorMsg)) {
                  echo "<div class='alert alert-danger alert-dismissible'>
                          $errorMsg
                        </div>";
              }
          ?>
  <img src="../img/logo.png" class="img-fluid d-block mx-auto" alt="Logo" width="120rem">  <br>
      <h3 style="text-align: center"><strong style="color: #F7941D">IBO</strong> ADMIN LOGIN</h3>
<br> 
      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              <i class="fas fa-envelope"></i>
          </span> 
        </div>
          <input type="text" class="form-control" name="username" required="required" placeholder="Username" autofocus required>
      </div>
    </div>

      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              <i class="fas fa-key"></i>
          </span> 
        </div>

      <input type="password" class="form-control" name="password" required="required" placeholder="Password" required>

      </div>
    </div>

    <div class="form-group" >
        <input type="submit"  class="btn form-control btn-primary btn-md mx-auto d-block" name="login" value="Login"></input>
    </div>

    <div style="text-align: center;" >
      <p><a href="password_reset.php" style="text-decoration: none; color: lightskyblue">Reset password</a></p>
    </div>


  </form>

</div>

<div class="col-md-4"></div>

</div>
</div>




</section>


<?php include "footer.php" ?>
<script src="../bootstrap/js/jquery-3.5.1.min.js"></script>
</body>
</html>