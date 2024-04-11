<?php 
ob_start();

    include 'controllers/con_payout.php'; 
    include 'header.php'; 



    if (isset($_POST['deleteBox'])) {
        
        $box = $_POST['deleteBox'];
        
        $obj1 = new con_reg_code_details();    
        $message = $obj1->code_status($box);
        echo $message;

    }

?>



    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">View Admin</h4><br>

                            <form action="" method="POST">

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">

                                

                                <thead>

                                <tr>
                                    <th>Account Number</th>
                                    <th>Transaction amount</th>
                                    <th>remarks By</th>
                                    <th>Used Status</th>
                                    <th>Used By</th>
                                    <th>Status</th>
                                </tr>
                                </thead>


                                <tbody>
                                    
                                    <?php
                                      $obj = new Con_payout();
                                      echo  $obj->payout();
                                   ?>

                                </tr>
                                </tbody>
                            </table>
                            </form>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->


        
<?php include('footer.php'); ?>