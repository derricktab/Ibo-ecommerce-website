<?php session_start(); ?>

<?php include('dbcon.php'); ?>

<?php

   
  
  if (isset($_POST['login'])) {

      $errorMsg = "Invalid Username Or Password";

      $email    = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
      $password = htmlentities($_POST['pass'], ENT_QUOTES, "UTF-8"); 
      
  if (!empty($email) || !empty($password)) {
    //  IF THEY HAVE AN AGENT ACCOUNT
        $query  = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $query);

      $number_of_rows = mysqli_num_rows($result);

        if($number_of_rows != 0){
          while ($row = mysqli_fetch_array($result)) {
            
            $passwords_match = password_verify($password, $row['password']);

            if ($passwords_match) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['fullname'] = $row['fullname'];
            }else{
                $errorMsg = "The email and password entered do not match";
            }    
          }
        }else{

    // IF THEY HAVE A ORDINARY CUSTOMER ACCOUNT
          $result = mysqli_query($con, "SELECT * FROM customers WHERE email='$email' ");

          if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['customer_id'] = $row['id'];
            }else{
                $errorMsg = "Invalid Login Details";
            }    
          }
        }
        else{
          $errorMsg = "Invalid Login Details";
        }
        } 
    }else{
      $errorMsg = "Invalid Login Details";
    }
  }


  if (isset($_SESSION['id'])) {
      header("Location: mlm/dashboard.php");
  }
  elseif(isset($_SESSION['customer_id'])){
    header("location: customer/");
  }

?>

<?php include "old-header.php" ?>

<style>
.drop-cat{
	display: none !important;
}
</style>

<!-- <link rel="stylesheet" href="style1.css"> -->
<title>IBO Login</title> 
<link rel="stylesheet" href="old-style.css">
 


<section>

<div class="container-fluid">
<div class="row">
<div class="col-md-4"></div>
<div class="col-md-4 form-wrapper m-2 pt-5">
  <form action="login.php" method="POST" >
          <?php
              if (isset($errorMsg)) {
                  echo "<div class='alert alert-danger alert-dismissible mb-3'>
                          $errorMsg
                        </div>";
              }
          ?>
      <h3 style="text-align: center" class="pb-4">Login to your <strong style="color: #F7941D">IBO</strong> account</h3>
<br> 
      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              <i class="fas fa-envelope"></i>
          </span> 
        </div>
          <input type="email" class="form-control" name="email" required="required" placeholder="Email" autofocus required>
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

      <input type="password" class="form-control" name="pass" required="required" placeholder="Password" required>

      </div>
    </div>

    <div class="form-group" >
        <input type="submit" style="width: 18rem;" class="btn btn-primary btn-md mx-auto d-block" name="login" value="Login"></input>
    </div>

    <div class="form-group">
    
    </div>

    <div style="text-align: center;" >
      <p>Not yet a member? <a href="register.php" style="color: lightskyblue; text-decoration: none"> Sign Up now</a></p>
      <p><a href="password_reset.php" style="text-decoration: none; color: lightskyblue">Reset password</a></p>
    </div>


  </form>

</div>

<div class="col-md-4"></div>

</div>
</div>




</section>


<?php include "old-footer.php" ?>
<script src="bootstrap/js/jquery-3.5.1.min.js"></script>
</body>
</html>