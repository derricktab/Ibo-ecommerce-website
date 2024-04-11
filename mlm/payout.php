<?php 

    include 'controllers/con_txn_payout.php'; 
    include 'header.php'; 


    if (isset($_POST['spoolBox'])) {
        
        $box = $_POST['spoolBox'];
        
        $obj1 = new con_txn_payout();    
        $message = $obj1->spool_status($box);
        echo $message;

        // foreach ($box as $value) {
        //     // echo "<ul><li>".$value."</li></ul>";
        //     $conn= open_db_connection();
        // $sql = "DELETE FROM registration_code_tb WHERE reg_code_row_id='$value' ";

        //     if ($conn->query($sql) === TRUE) {
        //         $_SESSION["SuccessMessage"]= "admin Deleted Successfully";
        //         header("Location:dashboard.php");
        //     } else {
        //         echo "Error deleting record: " . $conn->error;
        //     }
        // }

    }
    

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

                            <h4 class="mt-0 header-title">View Payout Request</h4><br>
                            
                            <form action="" method="POST">

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                               
                               <div class="pull-left">
                                    <button type="submit" name="spool" class="btn btn-info">Spool Selected</button>
                                </div>
                               
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>#no</th>
                                    <th>Account Number</th>
                                    <th>Transaction Amount</th>
                                    <th>Remark</th>
                                    <th>Bank Code</th>
                                    <th>Action</th>
                                </tr>
                                </thead>


                                <tbody>
                                    
                                    <?php
                                      $obj = new Con_txn_payout();
                                      echo  $obj->txn_payout();
                                   ?>

                                
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