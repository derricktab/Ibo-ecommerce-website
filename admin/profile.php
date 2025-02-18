<?php
include('../dbcon.php');
include('admin_session.php');


 ?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Profile | IBO Admin </title>
<link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="dashboard/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dashboard/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="dashboard/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="dashboard/plugins/summernote/summernote-bs4.min.css">

<style>
.logout-a{
    position: relative;
    bottom:0;
}
</style>


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/ibo/admin/dashboard/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/ibo/store" class="nav-link">Store</a>
      </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <!-- <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li> -->


      <li class="nav-item">
        <a class="nav-link" data-widget="user" href="profile.php" role="button">
          <i class="fas fa-user-circle"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="../img/logo.png" alt="IBO Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">IBO Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-user-circle"></i>
              <p>
                My Account
              </p>
            </a>
          </li>


          <li class="nav-item ">
                       <hr style="background: white;">

            <a href="dashboard/" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
            
          </li>

 
           <li class="nav-item">
            <a href="agents.php" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Agents
              </p>
            </a>

            </li>

             <li class="nav-item">
            <a href="leaderboard.php" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Leaderboard
              </p>
            </a>

            </li>


           <li class="nav-item">
            <a href="orders.php" class="nav-link">
              <i class="nav-icon fas fa-th-list"></i>
              <p>
                Orders
              </p>
            </a>
            </li>

           <li class="nav-item">
            <a href="products.php" class="nav-link">
              <i class="nav-icon fas fa-cart-arrow-down"></i>
              <p>
                Products
              </p>
            </a>
            </li>

           <li class="nav-item">
            <a href="payments.php" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Payments
              </p>
            </a>
          </li>

          <li class="nav-header logout-a"></li>
          <li class="nav-item">
            <a href="../logout.php" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>

          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

<?php 
if(isset($_POST['update_profile'])){
  $admin_name = htmlentities($_POST['admin_name'], ENT_QUOTES, "UTF-8");
  $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
  $phonenumber = htmlentities($_POST['phonenumber'], ENT_QUOTES, "UTF-8");

  $profile_updated = mysqli_query($con, "UPDATE admins SET admin_name='$admin_name', email='$email', phone_number='$phonenumber' WHERE admin_id='$session_id' ");

  if($profile_updated){
    $updated_message = "Profile Updated Successfully";
  }
  else{
    $failure_message = "FAILED TO UPDATE PROFILE FOR ADMIN $session_id";
  }
}

?>



 <?php

 $result=mysqli_query($con, "SELECT * FROM admins WHERE admin_id='$session_id'")or die('Error In Query or Session');
    $row=mysqli_fetch_array($result);

?>

<div class="container mt-5">
<div class="main-body">


<div class="row gutters-sm mb-4">
<div class="col-md-4 mb-3">
    <div class="card">
    <div class="card-body">
        <div class="d-flex flex-column align-items-center text-center">
        <img src="../images\1.png" alt="Admin" class="rounded-circle" width="150">
        <div class="mt-3">
            <h4> <?php echo strtoupper($row['admin_name']) ?> </h4>

            <p class="text-secondary mb-1">IBO Admin</p>
            <p class="text-muted font-size-sm">Kampala, Uganda</p>
            <button class="btn btn-outline-primary">Change Photo</button>
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
<!-- PRINT SUCCESS MESSAGE AFTER UPDATING PROFILE -->
      <?php if(isset($_POST['update_profile'])){ ?>
      <?php if(isset($updated_message)){ ?>
       <div class="alert alert-success alert-dismissible fade show" role="alert">

      <span class="text-white"><?php echo $updated_message ?></span> 

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>    
<?php } ?> 

      <?php  if(isset($failure_message)){ ?>

      <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <span class="text-white"><?php echo $failure_message ?></span> 
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
      </div>    
      <?php } ?>
      <?php } ?>

        <div class="row">

        <div class="col-sm-3">
            <h6 class="mb-0">Full Name</h6>
        </div>
        <div class="col-sm-9 text-secondary">
            <?php echo $row['admin_name'] ?>
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
            <?php echo $row['phone_number'] ?>
        </div>
        </div>
        <hr>
  

        <div class="row">
        <div class="col-sm-12">
            <a class="btn btn-info " href="edit-profile.php">Edit</a>
        </div>
        </div>
    </div>
    </div>

<div class="card mb-4">
<div class="card-body">
    <h4 class="mb-4">Change Password</h4>

    <?php 
if(isset($_POST['change_pass'])){
   $old_password = htmlentities($_POST['password_old'], ENT_QUOTES, "UTF-8");
   $new_password1 = htmlentities($_POST['new_password'], ENT_QUOTES, "UTF-8");
   $new_password2 = htmlentities($_POST['new_password2'], ENT_QUOTES, "UTF-8");
   $admin_username = $row['username'];


   if(password_verify($old_password, $row['password'])){

     if(strlen($new_password1) <= 8){
       $error_message = "Password too short. Password must contain atleast 8 Characters.";
     }
      else{
     if($new_password1 === $new_password2){

       $new_password = password_hash($new_password1, PASSWORD_DEFAULT);

       mysqli_query($con, "UPDATE admins SET password='$new_password' WHERE username='$admin_username' ");
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

      <span class="text-dark"><?php echo $error_message ?></span> 

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>

      </div>
      <?php } ?>

      <?php 
      if(!empty($success_message)){  
        ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">

      <span class="text-dark"><?php echo $success_message ?></span> 

      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>

      </div>
      <?php } ?>



    <form action="" method="post">
        <div class="form-group">
            <label for="">Enter Old Password</label>
            <input type="password" name="password_old" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Enter New Password</label>
            <input type="password" name="new_password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="">Confirm New Password</label>
            <input type="password" name="new_password2" class="form-control" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Change Password" name="change_pass">

    </form>
</div>





</div>
   
</div>
</div>

</div>
</div>


    </div>    

<!-- /BODY -->


<!-- /.content-wrapper -->
  <footer class="main-footer bottom-footer">
    <strong>Copyright &copy; 2024 <a href="../">IBO ASSOCIATIONAL GROUP CO LTD</a>.</strong>
    All rights reserved.
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="dashboard/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="dashboard/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

<!-- Bootstrap 4 -->
<script src="dashboard/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="dashboard/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="dashboard/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="dashboard/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="dashboard/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="dashboard/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="dashboard/plugins/moment/moment.min.js"></script>
<script src="dashboard/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="dashboard/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="dashboard/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="dashboard/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dashboard/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dashboard/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dashboard/dist/js/pages/dashboard.js"></script>
</body>
</html>
