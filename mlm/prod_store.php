<?php

include '../session.php';
include '../dbcon.php';

$statusMsg = '';

// Name of Directory Where Images are to be uploaded
$dir_name = "uploads/";

//Check if the directory already exists
if (!is_dir($dir_name)) {
//Create our directory if it does not exist
mkdir($dir_name);
echo "Directory created";
}



if($_SERVER["REQUEST_METHOD"] == "POST"){

    $product_name = htmlentities($_POST['prod_name'], ENT_QUOTES, "UTF-8");
    $product_description = htmlentities($_POST['prod_desc'], ENT_QUOTES, "UTF-8");
    $specifications = htmlentities($_POST['specifications'], ENT_QUOTES, "UTF-8");
    $product_price = htmlentities($_POST['prod_price'], ENT_QUOTES, "UTF-8");
    $product_category = htmlentities($_POST['category'], ENT_QUOTES, "UTF-8");
    $product_seller = htmlentities($_POST['owner'], ENT_QUOTES, "UTF-8");


    // $fileType = pathinfo($fileName, PATHINFO_EXTENSION);


    // // Allow certain file formats
    // $allowTypes = array('jpg','png','jpeg','gif');
    // if(in_array($fileType, $allowTypes)){


            //Insert Products into the database
            $insert_products = mysqli_query($con, "INSERT into products (prod_name, prod_desc, specifications, prod_price, category, supplier) VALUES ('$product_name', '$product_description', '$specifications', '$product_price', '$product_category', '$product_seller')" );


        foreach ($_FILES["file"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["file"]["tmp_name"][$key];

                // basename() may prevent filesystem traversal attacks;
                // further validation/sanitation of the filename may be appropriate
                $name = basename($_FILES["file"]["name"][$key]);
                move_uploaded_file($tmp_name, $dir_name.$name);



                $prod_result = mysqli_query($con, "SELECT * FROM products WHERE prod_name='$product_name'");
                $prod_id_fetched = mysqli_fetch_array($prod_result);
                $prod_id = $prod_id_fetched['prod_id'];

                //Insert the images to the database
                $insert_images = mysqli_query($con, "INSERT into prod_images (image_name, uploaded, prod_id) VALUES ('$name', NOW(), '$prod_id')");

                if($insert_products && $insert_images){
                    $statusMsg = "Product added to database successfully!";
                }
                else{
                    $statusMsg = "PRODUCT NOT ADDED TO DATABASE";
                }

            }
            else{
                $statusMsg = "FILE UPLOAD FAILED! PLEASE TRY AGAIN";    
            }
        }


 



} else{
    header("location: add_product.php");
}


// Display status message
echo $statusMsg;


?>