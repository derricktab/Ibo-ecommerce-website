<?php 

    include 'header.php';
    include 'controllers/con_signup_allowance.php';

?>



    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Signup Allowance</h4><br>

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Amount</th>
                                    <th>Transaction description</th>
                                    <th>Approved Date</th>
                                    <th>Approved Time</th>
                                </tr>
                                </thead>


                                <tbody>
                                    
                                    <?php
                                      $obj = new Con_signup_allowance();
                                      echo  $obj->signup_allowance();
                                   ?>

                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->


        
<?php include('footer.php'); ?>