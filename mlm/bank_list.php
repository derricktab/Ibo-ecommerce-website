<?php 

    include 'header.php';
    include 'controllers/con_bank_list.php';

?>

        <!-- ALERT  -->
        <?php echo Message(); 
            echo SuccessMessage();
        ?>

    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">View Bank List</h4><br>

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>#no</th>
                                    <th>Bank Name</th>
                                    <th>Bank Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    
                                    <?php
                                      $obj = new Con_bank_list();
                                      echo  $obj->bank_list();
                                   ?>

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