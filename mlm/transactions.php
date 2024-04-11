<?php 
   include 'header.php'; 

    $id = $_SESSION['id'];
    
    $result = mysqli_query($con, "select * from users where id=$id");
    $row = mysqli_fetch_array($result);

    $username = $row['username'];
    
?>


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">My Transactions</h4><br>

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Transaction ID</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Product</th>
                                    <th>Amount</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $result1 = mysqli_query($con, "SELECT * FROM transactions WHERE customer_name='$username'");
                                    if($result1){
                                        while($row = mysqli_fetch_array($result1)){
                                    ?>
                                    <tr>
                                    <th> <?php echo $row['trans_id'] ?> </th>
                                    <th> <?php echo $row['trans_type'] ?> </th>
                                    <th> <?php echo $row['transdate'] ?> </th>
                                    <th> <?php echo $row['prod_name'] ?> </th>
                                    <th> <?php echo number_format($row['total']); ?> </th>
                                    </tr>

                                    <!-- closing the while loop and if statement-->
                                    <?php }} ?>

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