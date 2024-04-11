
<?php

include "header.php";


if(isset($_GET['p'])){
    $product_id = htmlentities($_GET['p'], ENT_QUOTES, "UTF-8");
    
    $result = mysqli_query($con, "SELECT * FROM products WHERE prod_id = '$product_id'");
    if($result){
        $row = mysqli_fetch_array($result);
    }
    else{
        echo "FAILED TO GET DATA";
    }
}

if(isset($_POST['submit'])){
    $product_name = htmlentities($_POST['prod_name'], ENT_QUOTES, "UTF-8");
    $description = htmlentities($_POST['prod_desc'], ENT_QUOTES, "UTF-8");
    $specifications = htmlentities($_POST['specifications'], ENT_QUOTES, "UTF-8");
    $prod_price = htmlentities($_POST['prod_price'], ENT_QUOTES, "UTF-8");
    $owner = htmlentities($_POST['owner'], ENT_QUOTES, "UTF-8");
    $category = htmlentities($_POST['category'], ENT_QUOTES, "UTF-8");

    $result1 = mysqli_query($con, "UPDATE products set prod_name = '$product_name', prod_desc = '$description', specifications='$specifications', prod_price = '$prod_price', supplier='$owner', category = '$category' WHERE prod_id = '$product_id' ");
    if($result1){
        $success_message = "PRODUCT UPDATED SUCCESSFULLY!";
    }
    else{
        $error_message = "FAILED TO UPDATE PRODUCT, PLEASE TRY AGAIN.";
    }


$dir_name = "uploads/";


    foreach ($_FILES["file"]["error"] as $key => $error) {
        if ($error == UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["file"]["tmp_name"][$key];

            // basename() may prevent filesystem traversal attacks;
            // further validation/sanitation of the filename may be appropriate
            $name = basename($_FILES["file"]["name"][$key]);
            move_uploaded_file($tmp_name, $dir_name.$name);

            //Insert the images to the database
            $insert_images = mysqli_query($con, "INSERT into prod_images (image_name, uploaded, prod_id) VALUES ('$name', NOW(), '$product_id')");
            if(!$insert_images){
                $error_message = "Failed to insert images";
            }
        }

}
}


$result=mysqli_query($con, "SELECT * FROM users");
$user_row=mysqli_fetch_array($result);

$email = $user_row['email'];
$id = $user_row['id'];
$refer = $user_row['refer'];
$fullname = $user_row['fullname'];
$username = $user_row['username'];

 ?>



  <!-- Content Wrapper. Contains page content -->
 <div class="container-fluid " style="margin-left: 300px;">

<?php if(isset($success_message)){
    echo $success_message;
}
if(isset($error_message)){
    echo $error_message;
}
?>


<div class="row">

<form action="edit_product.php" method="POST" enctype="multipart/form-data">
<h3>EDIT PRODUCT</h3> <br>
<div class="form-group">
<label for="">Product Name</label>
    <input type="text" name="prod_name" class="form-control" value="<?php echo $row['prod_name'] ?>">
</div>

<div class="form-group">
    <label for="">Product Description</label>
    <textarea type="text" name="prod_desc" rows="3" class="form-control" ><?php echo $row['prod_desc'] ?></textarea>
</div>

<div class="form-group">
    <label for=""> Specifications </label>
    <textarea type="text" name="specifications" rows="3" class="form-control" ><?php echo $row['specifications'] ?></textarea>
</div>

<div class="form-group">
<label for="">Price (UGX)</label>
    <input type="text" name="prod_price" class="form-control" value="<?php echo $row['prod_price'] ?>">
</div>

 <input type="hidden" name="owner" value=<?php echo $username; ?> >

<?php

$result = mysqli_query($con, "SELECT * FROM category");
?>

<div class="form-group">
<label for=""> Product Category </label>

    <select name="category" id="" class="form-control" value="<?php echo $row['category'] ?>">
    <?php
			while($row=mysqli_fetch_array($result)) {
			
				echo "<option>" .$row["cat_name"] ."</option>";
            }
	?>		

    </select>
</div>
<?php 
$images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id = '$product_id' ");
$images_array = mysqli_fetch_array($images);

?>
<div class="form-group">
<label for="">Product Images</label> <br>
    <input type="file" name="file[]" multiple value="<?php echo $images_array['image_name'] ?>">
</div>

<div class="form-group">
    <input type="submit" name="submit" value="Save" class="btn btn-primary">
</div>

</form>    






</div>

</div>  

<!-- /BODY -->

<?php include "footer.php" ?>