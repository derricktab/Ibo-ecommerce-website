<?php 
    ob_start();

include('header.php');

include 'controllers/con_edit_user.php';
?>
<?php
    if(isset($_POST['submit'])){
        $user_name = $_POST['user_name'];
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $user_email = $_POST['user_email'];
        $phone_number = $_POST['phone_number'];
        $id = $_POST['id'];
        
        $obj1 = new Con_edit_user();    
        $message = $obj1->edit_user($user_name ,$first_name, $middle_name, $last_name, $user_email, $phone_number, $id);
        echo $message;
    }

?>


    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title"> Edit Users</h4><br>
                            <form action="edit_user.php" method="POST">
                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>User Name</label>
                                    <input class="form-control" type="text" name="user_name" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_user;
                    echo $result =$obj1->username($id);
                }
            ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label>First name</label>
                                    <input class="form-control" type="text" name="first_name" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_user;
                    echo $result =$obj1->firstname($id);
                }
            ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Middle name</label>
                                    <input class="form-control" type="text" name="middle_name" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_user;
                    echo $result =$obj1->middle_name($id);
                }
            ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label>Last Name</label>
                                    <input class="form-control" type="text" name="last_name" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_user;
                    echo $result =$obj1->lastname($id);
                }
            ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label>Email Address</label>
                                    <input class="form-control" type="email" name="user_email" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_user;
                    echo $result =$obj1->user_email($id);
                }
            ?>">
                                </div>
                                <div class="col-sm-6">
                                    <label>Phone Number</label>
                                    <input class="form-control" type="text" name="phone_number" id="example-text-input" value="<?php
                if (isset($_GET['id'])){
                    $id = $_GET['id'];
                    $obj1 = new con_edit_user;
                    echo $result =$obj1->phone_number($id);
                }
            ?>">
                                </div>
                            </div>
                                
                                <input value="<?php echo $_GET['id'] ?>" name="id" hidden>

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