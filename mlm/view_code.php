<?php 
include('header.php');

include 'controllers/con_view_reg_code.php';

?>


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Generate Code </h4><br>

                            <div class="row text-center">
                                <div class="col-lg-2 text-center">
                                    
                                </div>
                                <div class="col-lg-8 text-center">
                                    <!--=== Display_generated_code ===-->
                                    <h5 class="font-16 m-b-20"><?php
	                                     $obj1 = new con_view_reg_code;
	                                     echo $result =$obj1->view_reg_code();
                                    ?></h5>
                                     
                                <!--=== End_Display ===-->


                                </div>
                                <div class="col-lg-2 text-center">
                                    
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
        
        
        
    
    