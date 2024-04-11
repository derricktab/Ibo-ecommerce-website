<?php 

    include 'header.php';
    include '../session.php';

    $id = $_SESSION['id'];
    
    $result = mysqli_query($con, "select * from users where id=$id");
    $row = mysqli_fetch_array($result);

    $username = $row['username'];
?>
<style>
.btn-outline-primary{
    margin-left: 15px;
}

</style>
    <div class="page-content-wrapper ">

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">My Products</h4><br>

                            <table class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%">
                                <thead>
                                <tr>
                                    <th style="width: 150px;" >Product Image</th>
                                    <th>Product Name</th>
                                    <th style="width: 200px;">Desctiption</th>
                                    <th>Price</th>
                                    <th>Category</th>
                                     <th style="width: 150px;;">Action</th>
                                </tr>
                                </thead>


                                <?php
                                    // Query the database for the user's products
                                    $product_query = mysqli_query($con, "SELECT * FROM products WHERE supplier='$username'  ");
                                

                                ?>


                                <tbody>
                        <!-- THE TABLE CONTENTS GO HERE -->
                                <?php
                                while($products_row = mysqli_fetch_array($product_query)){

                                $user_prod_id = $products_row['prod_id'];

                                // Query the database for the product images of the user
                                $image_query = mysqli_query($con, "SELECT image_name FROM prod_images WHERE prod_id='$user_prod_id' LIMIT 1 ");
                                
                                if($product_query && $image_query){
        
                                    while($images_row = mysqli_fetch_array($image_query) ){ ?>
                                        <tr>
                                            <td> <img src="<?php echo "uploads/".$images_row['image_name']; ?>" height="150px" width="150px" /> </td>
                                            <td> <?php echo $products_row['prod_name']; ?>  </td>
                                            <td> <?php echo $products_row['prod_desc']; ?>  </td>
                                            <td> <?php echo $products_row['prod_price']; ?>  </td>
                                            <td> <?php echo $products_row['category']; ?>  </td>
                                            <td>  <a href="edit_product.php?p=<?php echo $user_prod_id ?>">Edit</a> | <a href="#" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
                    </td>
                                        </tr>

                              <!-- close loop and if statement -->
                                <?php }}} ?>

                                </tbody>
 
                                
                            </table>
                               <a href="add_product.php">
                                
                                <button type="button" class="btn btn-outline-primary"> ADD PRODUCT</button>
                                </a>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->

        </div><!-- container -->


    </div> <!-- Page content Wrapper -->

</div> <!-- content -->


        
<?php include('footer.php'); ?>