<?php include "header.php" ?>
<?php include "../dbcon.php" ?>
<?php include('../session.php'); ?>

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
        <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <?php echo $row['fullname'] ?>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Email</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <?php echo $row['email'] ?>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Phone</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <?php echo $row['phone'] ?>
        </div>
        </div>
        <hr>
  
        <div class="row">
        <div class="col-sm-3">
            <h6 class="mb-0">Refferer</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <?php echo $row['refer'] ?>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-info " target="__blank" href="https://www.bootdey.com/snippets/view/profile-edit-data-and-skills">Edit</a>
        </div>
        </div>
    </div>
    </div>

<div class="card mb-4">
<div class="card-body">
    <h4 class="mb-4">Change Password</h4>
    <form action="" method="post">
        <div class="form-group">
            <label for="">Enter Old Password</label>
            <input type="text" name="password_old" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Enter New Password</label>
            <input type="text" name="new_password" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Confirm New Password</label>
            <input type="text" name="new_password_2" class="form-control">
        </div>

        <input type="submit" class="btn btn-primary" value="Change Password">

    </form>
</div>

</div>
   
</div>
</div>

</div>
</div>


<?php include "footer.php" ?>