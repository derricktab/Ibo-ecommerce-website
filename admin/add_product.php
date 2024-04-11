<?php
include('../dbcon.php');
include('admin_session.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products | IBO Admin </title>

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

.add_btn{
  float: left;
  margin-right: 10px;
  background: #FF6600;
  color: white;
  font-weight: bold;
}
.add_btn:hover{
  color: white;
  background: black;
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
            <a href="profile.php" class="nav-link">
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
            <a href="#" class="nav-link active">
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
 <div class="container-fluid " style="margin-left: 300px;">

<div class="row">

<form action="prod_store.php" method="POST" enctype="multipart/form-data">
<h3>ADD PRODUCTS</h3> <br>
<div class="form-group">
<label for="">Product Name</label>
    <input type="text" name="prod_name" class="form-control">
</div>

<div class="form-group">
    <label for="">Product Description</label>
    <textarea type="text" name="prod_desc" rows="3" class="form-control"></textarea>
</div>

<div class="form-group">
    <label for=""> Specifications </label>
    <textarea type="text" name="specifications" rows="3" class="form-control"></textarea>
</div>

<div class="form-group">
<label for="">Price (UGX)</label>
    <input type="text" name="prod_price" class="form-control">
</div>

 <input type="hidden" name="owner" value=<?php echo $username; ?> >

<?php

$result = mysqli_query($con, "SELECT * FROM category");
?>

<div class="form-group">
<label for=""> Product Category </label>

    <select name="category" id="" class="form-control">
    <?php
			while($row=mysqli_fetch_array($result)) {
			
				echo "<option>" .$row["cat_name"] ."</option>";
            }
	?>		

    </select>
</div>

<div class="form-group">
<label for="">Product Images</label> <br>
    <input type="file" name="file[]" multiple>
</div>

<div class="form-group">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</div>

</form>    






</div>

</div>  

<!-- /BODY -->


<!-- /.content-wrapper -->
  <footer class="main-footer bottom-footer">
    <strong>Copyright &copy; 2021 <a href="../">IBO ASSOCIATIONAL GROUP CO LTD</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      Website Design by <b><a href="mailto: derricktab44@gmail.com">Derrick Tab</a></b>
    </div>
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
