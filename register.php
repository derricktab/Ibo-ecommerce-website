<?php session_start(); ?>
<?php include('dbcon.php'); ?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="old-style.css">
<title>Sign Up | IBO </title>
</head>
<body>

<?php include 'old-header.php' ?>
<?php
 if(isset($_GET['refer'])){

  	$refer = htmlentities($_GET['refer'], ENT_QUOTES, "UTF-8");

  }
else{
	$refer = "system";
}

?>




  <?php

 

if($_SERVER["REQUEST_METHOD"] == "POST"){

	//Cleaning the data from the form before entering it in the database
	$fullname = htmlentities ($_POST['fullname'], ENT_QUOTES, "UTF-8" );
	$username = htmlentities ($_POST['username'], ENT_QUOTES, "UTF-8" );
	$email = htmlentities ($_POST['email'], ENT_QUOTES, "UTF-8" );
	$phone = htmlentities ($_POST['phonenumber'], ENT_QUOTES, "UTF-8" );
	$password1 = htmlentities ($_POST['pass'], ENT_QUOTES, "UTF-8" );
	$password2 = htmlentities ($_POST['pass2'], ENT_QUOTES, "UTF-8" );
	$refer = htmlentities($_POST['refer'], ENT_QUOTES, "UTF-8");
	$errormsg = "";


	$password_length = strlen($password1);

	if($password_length<8){
		$errorMsg = "Password Too Short! The Password should be atleast 8 Characters long.";
	}

	$query = mysqli_query($con, "SELECT * FROM users WHERE username='$username' "); //Query the users table
  $number_of_rows = mysqli_num_rows($query);
	if($number_of_rows != 0){
    $errorMsg = "The Username is already taken.";
  }
  else{

  if($password1 == $password2){

	$password = password_hash($password1, PASSWORD_DEFAULT);

		mysqli_query($con, "INSERT INTO users (fullname, username, email, phone, password, refer, date_joined) VALUES ('$fullname', '$username', '$email', '$phone', '$password', '$refer', NOW() )"); //Inserts the value to table users
		Print '<script>alert("Successfully Registered!");</script>'; 
		Print '<script>window.location.assign("contact.php");</script>';

	
  }
  else{
    $errorMsg = "The Passwords Do Not Match";
  }  
  
  }

}
?>

<div class="container">
<div class="row">
<div class="col-md-4"></div>
<div class="form-wrapper col-md-4 m-2">

  <form action="register.php" method="POST">

	<?php
		if (isset($errorMsg)) {
			echo "<div class='alert alert-danger alert-dismissible'>
					$errorMsg
					</div>";
		}
	?>
<br>
    <h3 style="color: white; text-align: center">Create an IBO account</h3>
<br>
      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              <i class="far fa-user"></i>
          </span> 
    	</div>
	
          <input type="text"  name="fullname" class="form-control" required="required" placeholder="Full Name" autofocus required>
      </div>
    </div>

      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text"> @ </span> 
    	</div>
	
          <input type="text"  name="username" class="form-control" required="required" placeholder="Username"  required>
      </div>
    </div>

      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              <i class="fas fa-envelope"></i>
          </span> 
    	</div>
	
          <input type="email"  name="email" class="form-control" required="required" placeholder="Email"  required>
      </div>
    </div>

      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              <i class="fas fa-phone"></i>
          </span> 
    	</div>
	
          <input type="tel"  name="phonenumber" class="form-control" required="required" placeholder="Phone Number"  required>
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
          <input type="password"  name="pass" class="form-control"  required="required" placeholder="Password"  required>
      </div>
    </div>

      <!-- Form Group -->
    <div class="form-group">
		<input type="hidden" name="refer" value = <?php echo $refer ?>>
    </div>

      <!-- Form Group -->
    <div class="form-group">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">
              <i class="fas fa-key"></i>
          </span> 
    	</div>
	
          <input type="password"  name="pass2" class="form-control" required="required" placeholder="Confirm Password"  required>
      </div>
    </div>

    <div >
		<input style="width: 20rem;" type="submit" class="btn btn-primary d-block mx-auto" name="Register" value="Register"></input>
    </div>
	<br>
	<div style="text-align: center; color: white">
		<p>Already a member? <a href="login.php" style="color: lightskyblue; text-decoration: none;">Sign in</a></p>

	</div>  

</form>
 
 </div>
 <div class="col-md-4"></div>
</div>
</div>

 
 <?php include 'old-footer.php' ?>

</body>
</html>
