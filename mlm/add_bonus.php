<?php 
    ob_start();

include('header.php');

include 'controllers/con_add_bonus.php';
?>
<?php
    if(isset($_POST['submit'])){
        $bonus_name = $_POST['bonus_name'];
        $amount = $_POST['amount'];
        
        $obj1 = new Con_add_bonus();
        $message = $obj1->add_bonus($bonus_name, $amount);
        echo $message;
    }

?>


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Add New Bonus</h4><br>
                            <form action="add_bonus.php" method="POST">
                            <div class="form-group row">
                                
                                <div class="col-sm-6">
                                    <label>Bonus Name</label>
                                    <input class="form-control" type="text" name="bonus_name" id="example-text-input">
                                </div>
                                <div class="col-sm-6">
                                    <label>Amount</label>
                                    <input class="form-control" type="number" name="amount" id="example-text-input">
                                </div>
                            </div>

                            <div class="form-group row pull-right">
                                
                                <div class="col-sm-6">
                                    <button type="Submit" name="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->

                


<?php include('footer.php'); ?>