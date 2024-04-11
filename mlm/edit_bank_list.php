<?php 
    ob_start();

include('header.php');

include 'controllers/con_edit_bank_list.php';
?>
<?php
    if(isset($_POST['submit'])){
        $bank_name = $_POST['bank_name'];
        $bank_code = $_POST['bank_code'];
        $id = $_POST['id'];
        
        
        $obj1 = new Con_edit_bank_list();    
        $message = $obj1->edit_bank_list($bank_name, $bank_code, $id);
        echo $message;
    }

?>
   
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Edit Bank List</h4><br>
                            <form action="edit_bank_list.php" method="POST">
                            <div class="form-group row">
                                
                                <div class="col-sm-6">
                                    <label>Bank Name</label>
                                    <input class="form-control" type="text" name="bank_name" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_bank_list;
                    echo $result =$obj1->bank_name($id);
                }
            ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label>Bank Code</label>
                                    <input class="form-control" type="number" name="bank_code" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_bank_list;
                    echo $result =$obj1->bank_code($id);
                }
            ?>">
                                </div>
                            </div>
                            <input value="<?php echo $_GET['id']; ?>" name="id" hidden>

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

<?php ob_end_flush(); ?>