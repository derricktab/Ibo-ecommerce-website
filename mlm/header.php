<?php
include '../session.php';
include '../dbcon.php';


$result=mysqli_query($con, "select * from users where id='$session_id'")or die('Error In Session');
$row=mysqli_fetch_array($result);
$fullname = $row['fullname'];
?>



<!DOCTYPE html>
<html>
    
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title> User Area | IBO </title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="ThemeDesign" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="../img/logo.png">

    <!--==== DataTable ===-->
        <!-- DataTables -->
        <link href="assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <!-- Responsive datatable examples -->
        <link href="assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!--====  End DataTable ====-->


        <!--Morris Chart CSS -->
        <link rel="stylesheet" href="assets/plugins/morris/morris.css">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="fontawesome\css\all.min.css" rel="stylesheet" type="text/css">
<style>
.fa-power-off{
    color: red;
}
.nav-user{
    color: white;
    margin-top: 10px;
    margin-bottom: -3px;
    margin-right: 25px;
}

.custom-styling{
    margin-left: 30px;
}

.custom-styling li a{
    color: #C0C0C0;
}

.custom-styling li a:hover{
    color: white;
}
</style>
    </head>


    <body class="fixed-left">

        <!-- Loader -->
        <!-- <div id="preloader"><div id="status"><div class="spinner"></div></div></div> -->

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
                    <i class="ion-close"></i>
                </button>

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <!--<a href="index.html" class="logo">Admiry</a>-->
                        <a href="dashboard.php" class="logo"><img src="../img/logo.png" height="100" alt="logo"></a>
                        <br>
                        <h4 class="font-16"><a href="profile.php"><?php echo strtoupper($_SESSION['fullname']); ?> </a> </h4>
                            <span class="text-muted user-status"><i class="fa fa-dot-circle-o text-success"></i> Online</span>

                    </div><br>
                </div>

                <div class="sidebar-inner slimscrollleft">

                    <div id="sidebar-menu">
                        <ul>

                            <li>
                                <a href="dashboard.php" class="waves-effect">
                                    <i class="ti-home"></i>
                                    <span> Dashboard </span>
                                </a>
                            </li>

                            <li>
                                <a href="wallet.php" class="waves-effect">
                                    <i class="fa fa-money"></i>
                                    <span> Wallet </span>
                                </a>
                            </li>

                            <li>
                                <a href="user_products.php" class="waves-effect">
                                    <i class="fa fa-tags"></i>
                                    <span> My Products </span>
                                </a>
                            </li>

                            <li>
                                <a href="referrals.php" class="waves-effect">
                                    <i class="fa fa-id-card-o"></i>
                                    <span> Referrals </span>
                                </a>
                            </li>
                            <li>
                                <a href="smartcard.php" class="waves-effect">
                                    <i class="fa fa-credit-card"></i>
                                    <span> IBO Smart Card </span>
                                </a>
                            </li>

                            <li>
                                <a href="transactions.php" class="waves-effect"><i class="fa fa-line-chart"></i> <span> My Transactions </span> 
                            </li>

                            
                             <li>
                                <a href="../logout.php" class="waves-effect">
                                    <i class="fa fa-power-off"></i>
                                    <span> Logout </span>
                                </a>
                            </li>

                            <br><br>
                            

                        </ul>
                    </div>
                    <div class="clearfix"></div>
                </div> <!-- end sidebarinner -->
            </div>
            <!-- Left Sidebar End -->

            <!-- Start right Content here -->

            <div class="content-page">
                <!-- Start content -->
                <div class="content">

                    <!-- Top Bar Start -->
                    <div class="topbar">

                        <nav class="navbar-custom">

                            <ul class="list-inline float-right mb-0">
                             

                                <li class="list-inline-item dropdown notification-list">
                                    <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                       aria-haspopup="false" aria-expanded="false">
                                    <i class="fa fa-user-circle-o fa-2x" aria-hidden="true"></i>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                        
                                        <a class="dropdown-item" href="profile.php"><i class="fa fa-user m-r-5 text-muted"></i> Profile</a>
                                        <a class="dropdown-item" href="../logout.php"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
                                    </div>
                                </li>

                            </ul>

                            <ul class="list-inline menu-left mb-0">
                                <li class="list-inline-item">
                                    <button type="button" class="button-menu-mobile open-left waves-effect">
                                        <i class="ion-navicon"></i>
                                    </button>
                                </li>
                                <li class="hide-phone list-inline-item app-search">
                                    <h3 class="page-title">User Dashboard</h3>
            
                                </li>
                            <span class="custom-styling">

                                <li class="list-inline-item app-search">
                                   <a href="/ibo/"> | Shop | </a>
            
                                </li>
                            </span>
                            </ul>

                            <div class="clearfix"></div>

                        </nav>

                    </div>
                    <!-- Top Bar End -->