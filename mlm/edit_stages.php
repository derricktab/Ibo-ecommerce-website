<?php 
    ob_start();

include('header.php');

include 'controllers/con_edit_stages.php';
?>
<?php
    if(isset($_POST['submit'])){
        $stages = $_POST['stages'];
        $id = $_POST['id'];
        
        $obj1 = new con_edit_stages();    
        $message = $obj1->edit_stages($stages , $id);
        echo $message;
    }

?>


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Edit Stages</h4><br>
                            <form action="edit_stages.php" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Stages</label>
                                    <input class="form-control" type="text" value="<?php
                if (isset($_GET['stage_id'])){
                    $stage_id = $_GET['stage_id'];
                    $obj1 = new con_edit_stages;
                    echo $result =$obj1->stage_title($stage_id);
                }
            ?>" name="stages" id="example-text-input">
                                    <input type="text" name="id" value="<?php echo $_GET['stage_id']?>"hidden>
                                </div>
                                
                            </div>

                            

                            <div class="form-group row">
                                
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