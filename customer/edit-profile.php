<?php include "header.php" ?>
<?php include "../dbcon.php" ?>
<?php include "../session.php" ?>


<?php

 $result=mysqli_query($con, "SELECT * FROM users WHERE id='$session_id'")or die('Error In Session');
    $row=mysqli_fetch_array($result);

?>

<div class="container">
<div class="main-body">


<div class="row gutters-sm mb-4">
<div class="col-md-4 mb-3">
    <div class="card">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
        <img src="assets\images\users\1.jpg" alt="Admin" class="rounded-circle" width="150">
        <div class="mt-3">
            <h4> <?php echo strtoupper($row['fullname']) ?> </h4>

            <p class="text-secondary mb-1">IBO Agent</p>
            <p class="text-muted font-size-sm">Kampala, Uganda</p>
            <button class="btn btn-primary">Follow</button>
            <button class="btn btn-outline-primary">Message</button>
        </div>
        </div>
    </div>
    </div>
    <div class="card mt-3">
    <ul class="list-group list-group-flush">

        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
        <h6 class="mb-0"> <i class="fa fa-twitter"></i> Twitter</h6>
        <span class="text-secondary">@<?php echo $row['username'] ?> </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
        <h6 class="mb-0"> <i class="fa fa-instagram"></i> Instagram</h6>
        <span class="text-secondary"><?php echo $row['username'] ?> </span>
        </li>
        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
        <h6 class="mb-0"> <i class="fa fa-facebook"></i> Facebook</h6>
        <span class="text-secondary"><?php echo $row['username'] ?> </span>
        </li>
    </ul>
    </div>
</div>
<div class="col-md-8">
    <div class="card mb-3">
    <div class="card-body">

        <form action="profile.php" method="post">

        <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="fullname" value="<?php echo $row['fullname'] ?>">
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 ">
            <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>">
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
        </div>
        <div class="col-sm-9">
            <input type="text" class="form-control" name="phonenumber" value="<?php echo $row['phone'] ?>">
        </div>
        </div>
        <hr>

        <div class="row">
        <div class="col-sm-12">
            <input type="submit" class="btn btn-primary" name="update_profile" value="Update Profile">
        </div>
        </div>
        </form>
    </div>
    </div>

<div class="card mb-4">
<div class="card-body">
    <h4 class="mb-4">Change Password</h4>

    <?php 
if(isset($_POST['change_pass'])){
   $old_password = mysqli_real_escape_string($con, $_POST['password_old']);
   $new_password1 = mysqli_real_escape_string($con, $_POST['new_password']);
   $new_password2 = mysqli_real_escape_string($con, $_POST['new_password2']);
   $agent_username = $row['username'];


   if(password_verify($old_password, $row['password'])){

     if(strlen($new_password1) <= 8){
       $error_message = "Password too short. Password must contain atleast 8 Characters.";
     }
      else{
     if($new_password1 === $new_password2){

       $new_password = password_hash($new_password1, PASSWORD_DEFAULT);

       mysqli_query($con, "UPDATE users SET password='$new_password' WHERE username='$agent_username' ");
       $success_message =  "Password Updated Successfully";
     }
     else{
       $error_message =  "The New Passwords Dont Match";
     }

   }
   }
   else{
     $error_message =  "Verification Failed! Please Try Again";
   }
}

?>

      <!-- PRINTING THE ERROR MESSAGE -->
      <?php 
      if(!empty($error_message)){      
      ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">

      <span class="text-white"><?php echo $error_message ?></span> 

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>

      </div>
      <?php } ?>

      <?php 
      if(!empty($success_message)){  
        ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">

      <span class="text-dark"> <?php echo $success_message ?> </span> 

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>

      </div>
      <?php } ?>


    <form action="" method="post">
        <div class="form-group">
            <label for="">Enter Old Password</label>
            <input type="password" name="password_old" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Enter New Password</label>
            <input type="password" name="new_password" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Confirm New Password</label>
            <input type="password" name="new_password2" class="form-control">
        </div>

        <input type="submit" class="btn btn-primary" value="Change Password" name="change_pass">

    </form>
</div>

</div>
   
</div>
</div>

</div>
</div>


<?php include "footer.php" ?>
