<?php
include "header.php";

$result=mysqli_query($con, "SELECT * FROM users");
$row=mysqli_fetch_array($result);

$email = $row['email'];
$id = $row['id'];
$refer = $row['refer'];
$fullname = $row['fullname'];
$username = $row['username'];

 ?>



  <!-- Content Wrapper. Contains page content -->
 <div class="container-fluid " style="margin-left: 300px;">

<div class="row">

<form action="prod_store.php" method="POST" enctype="multipart/form-data">
<h3>ADD PRODUCTS</h3> <br>
<div class="form-group">
<label for="">Product Name</label>
    <input type="text" name="prod_name" class="form-control">
</div>

<div class="form-group">
    <label for="">Product Description</label>
    <textarea type="text" name="prod_desc" rows="3" class="form-control"></textarea>
</div>

<div class="form-group">
    <label for=""> Specifications </label>
    <textarea type="text" name="specifications" rows="3" class="form-control"></textarea>
</div>

<div class="form-group">
<label for="">Price (UGX)</label>
    <input type="text" name="prod_price" class="form-control">
</div>

 <input type="hidden" name="owner" value=<?php echo $username; ?> >

<?php

$result = mysqli_query($con, "SELECT * FROM category");
?>

<div class="form-group">
<label for=""> Product Category </label>

    <select name="category" id="" class="form-control">
    <?php
			while($row=mysqli_fetch_array($result)) {
			
				echo "<option>" .$row["cat_name"] ."</option>";
            }
	?>		

    </select>
</div>

<div class="form-group">
<label for="">Product Images</label> <br>
    <input type="file" name="file[]" multiple>
</div>

<div class="form-group">
    <input type="submit" name="submit" value="Submit" class="btn btn-primary">
</div>

</form>    






</div>

</div>  

<!-- /BODY -->

<?php include "footer.php" ?>