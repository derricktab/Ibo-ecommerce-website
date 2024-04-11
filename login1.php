
<?php include('dbcon.php'); ?>

<?php

   
  
  if (isset($_POST['login'])) {

      $errorMsg = "";

      $email    = mysqli_real_escape_string($con, $_POST['email']);
      $password = mysqli_real_escape_string($con, $_POST['pass']); 
      
  if (!empty($email) || !empty($password)) {
        $query  = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($con, $query);
        if(mysqli_num_rows($result) == 1){
          while ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['fullname'] = $row['fullname'];
            }else{
                $errorMsg = "The email and password entered do not match";
            }    
          }
        }else{
          $errorMsg = "The email and password entered do not match";
        } 
    }else{
      $errorMsg = "Email and Password is required";
    }
  }


  if (isset($_SESSION['id'])) {
      header("Location: mlm/dashboard.php");
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
<div class="col-md-4 form-wrapper">
<br>
  <form action="login.php" method="POST" >
          <?php
              if (isset($errorMsg)) {
                  echo "<div class='alert alert-danger alert-dismissible'>
                          $errorMsg
                        </div>";
              }
          ?>
  <img src="img/logo.png" class="img-fluid d-block mx-auto" alt="Logo" width="120rem">  <br>
      <h3 style="text-align: center">Login to your <strong>IBO</strong> account</h3>
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