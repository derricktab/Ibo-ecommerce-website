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

                            <h4 class="mt-0 header-title">People You Have Reffered to IBO</h4><br>

                            <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Date Joined</th>
                                </tr>
                                </thead>


                                <tbody>
                                    <?php
                                    $result1 = mysqli_query($con, "SELECT * FROM users WHERE refer='$username'");
                                    if($result1){
                                        while($row = mysqli_fetch_array($result1)){
                                    ?>
                                    <tr>
                                    <th> <?php echo $row['fullname'] ?> </th>
                                    <th> <?php echo $row['email'] ?> </th>
                                    <th> <?php echo $row['date_joined'] ?> </th>
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