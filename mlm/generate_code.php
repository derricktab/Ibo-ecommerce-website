<?php 
include('header.php');

?>


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Generate Code </h4><br>

                            <div class="row text-center">
                                <div class="col-lg-4 text-center">
                                    
                                </div>
                                <div class="col-lg-4 text-center">
                                    <h5 class="font-16 m-b-20">Click button to generate code</h5>

                                        <form action="code_process.php" method="POST">
                                            <input type="number" class="form-control" name="quantity" placeholder="Choose quantity">
                                            <br>
                                            <button class="btn btn-info">Generate code</button>
                                        </form>

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