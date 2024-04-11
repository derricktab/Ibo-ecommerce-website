<?php 
include('header.php');

include('controllers/con_maintenance.php');

?>


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Maintenance Status </h4><br>

                            <div class="row text-center">
                                <div class="col-lg-4 text-center">
                                    
                                </div>
                                <div class="col-lg-4 text-center">
                                    <h5 class="font-16 m-b-20"><?php
                                        $obj1 = new con_maintenance;
                                        echo $result =$obj1->maintenance();
                                    ?></h5>

                                        <a href="change_maintenance.php"><button class="btn btn-info">Change Status</button></a>

                                </div>
                                <div class="col-lg-4 text-center">
                                    
                                </div>
                            </div><br><br>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

                


<?php include('footer.php'); ?>