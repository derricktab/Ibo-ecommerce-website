<?php 
// Include the database configuration file  
require_once '../dbcon.php'; 
include '../session.php';
 
// Get image data from database 
$result = mysqli_query($con, "SELECT * FROM prod_images ORDER BY uploaded DESC"); 
?>

<?php if($result->num_rows > 0){ ?> 
    <div class="gallery"> 
        <?php while($row = mysqli_fetch_assoc($result)){ ?> 
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['images']); ?>" height=200px/> 
        <?php } ?> 
    </div> 
<?php }else{ ?> 
    <p class="status error">Image(s) not found...</p> 
<?php } ?>