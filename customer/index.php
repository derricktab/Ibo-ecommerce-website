<?php
    
    include('header.php');

?>


<title>Customer Dashboard</title>

<div class="page-content-wrapper ">

<div class="container-fluid">


<div class="row">

    <div class="col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                
    <h4 class="mt-0 header-title">

        <div >
            Hi, <b> <?php echo strtoupper($firstname); ?> </b>
            <hr>
        </div>
    </h4>

        <div class="mini-stat clearfix bg-white">
            <span class="mini-stat-icon bg-light"><i class="fa fa-user"></i></span>

            <div class="mini-stat-info text-left ">
        <?php  
            if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
                $url = "https://";   
            else  
                $url = "http://";   
            // Append the host(domain name, ip) to the URL.   
            $url.= $_SERVER['HTTP_HOST'];   
            
            // Append the requested resource location to the URL   
            // $url.= $_SERVER['REQUEST_URI'];    
            
       ?>  
                Share this link with friends and family and whoever joins IBO with your link, you get a 35% comission <br> <br>

                <input type="text" class="copy" id="myInput" value="<?php echo $url; ?>/ibo/register.php?refer=<?php echo $firstname ?>" readonly>
                <input type="button" class="btn btn-primary" value="Copy Link" onclick="myFunction()">
                
            </div>
        </div>

        </div>
    </div>
</div>

</div>


            <div class="row">
                <div class="col-md-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Invites Sent</h4>

                            <ul class="list-inline widget-chart m-t-20 text-center">
                                <li>
                                    <h4 class=""><b>3652</b></h4>
                                    <p class="text-muted m-b-0">Marketplace</p>
                                </li>
                                <li>
                                    <h4 class=""><b>5421</b></h4>
                                    <p class="text-muted m-b-0">Last week</p>
                                </li>
                                <li>
                                    <h4 class=""><b>9652</b></h4>
                                    <p class="text-muted m-b-0">Last Month</p>
                                </li>
                            </ul>

                            <div id="morris-area-example" style="height: 300px"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Earnings</h4>

                            <ul class="list-inline widget-chart m-t-20 text-center">
                                <li>
                                    <h4 class=""><b>5248</b></h4>
                                    <p class="text-muted m-b-0">Marketplace</p>
                                </li>
                                <li>
                                    <h4 class=""><b>321</b></h4>
                                    <p class="text-muted m-b-0">Last week</p>
                                </li>
                                <li>
                                    <h4 class=""><b>964</b></h4>
                                    <p class="text-muted m-b-0">Last Month</p>
                                </li>
                            </ul>

                            <div id="morris-bar-example" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>

              </div>
            <!-- end row -->


        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

<script src="copy_to_clipboard.js"></script>

<?php include('footer.php'); ?>