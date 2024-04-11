
<?php 

if(isset($_GET['p']) ){
    $product_id = htmlentities($_GET['p'], ENT_QUOTES, "UTF-8");
}
else{
  header("location: /ibo/");
}
?>

<?php include "header.php" ?>


<title>Product Details</title>

<style>
.main-category{
	display: none !important;
}
.drop-cat:hover .main-category{
	display: block !important;
}
</style>


<style>

/* PRODUCTS PREVIES GALLERY STYLES  */

/* Hide the images by default */
.mySlides {
  margin-bottom: 10px;
  display: none;
}

/* Add a pointer when hovering over the thumbnail images */
.cursor {
  cursor: pointer;
}

/* Next & previous buttons */
.prev,
.next {
  cursor: pointer;
  position: absolute;
  top: 40%;
  width: auto;
  padding: 16px;
  margin-top: -50px;
  color: white;
  font-weight: bold;
  font-size: 20px;
  border-radius: 0 3px 3px 0;
  user-select: none;
  -webkit-user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover,
.next:hover {
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
  background: rgba(0,0,0,0.5);
  border-radius: 15%;
}


.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Six columns side by side */
.column {
  float: left;
  width: 23.2%;
  margin-right: 5px;
}

/* Add a transparency effect for thumnbail images */
.demo {
  opacity: 0.5;
  height: 80px;
  margin-left: 15px;
}

.active,
.demo:hover {
  opacity: 1;
}

.col-lg-6{
    padding-left: 0 !important;
    padding-right: 0px !important;
    margin-right: 15px;
    margin-left: 15px;
}

.mySlides img{
    max-height: 400px;
    width: 100%;
}



/* REVIEW  STYLES */

.btn-grey{
    background-color:#D8D8D8;
	color:#FFF;
}
.rating-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px 15px 20px 15px;
	border-radius:3px;
}
.bold{
	font-weight:700;
}

.review-block{
	background-color:#FAFAFA;
	border:1px solid #EFEFEF;
	padding:15px;
	border-radius:3px;
	margin-bottom:15px;
}
.review-block-name{
	font-size:12px;
	margin:10px 0;
}
.review-block-date{
	font-size:12px;
}
.review-block-rate{
	font-size:13px;
	margin-bottom:15px;
}
.review-block-title{
	font-size:15px;
	font-weight:700;
	margin-bottom:10px;
}

.pull-left{
    float:left;
}

.pull-right{
    float: right;
}
</style>

<?php if(isset($_GET['status'])){ ?>

<div class="container">
    <div class="row mt-5 ">
        <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                Product successfully added to cart. <a href="cart.php" class="alert-link">View Cart</a>
            </div>
        </div>
    </div>
</div>
<?php } ?>

<!-- START PROD DETAILS -->
<div class="container mt-5">
  <div class="row mb-4">

    <div class="col-lg-6">
      
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>


<?php 

$result = mysqli_query($con, "SELECT * FROM products WHERE prod_id = '$product_id' ");
$row = mysqli_fetch_array($result);


    //	Fetching product images from the database
    $prod_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' ");

   $counter = 0;

    while($prod_img_array = mysqli_fetch_array($prod_images)){
    $counter ++;

?>  


<div class="mySlides">
    <div class="numbertext"><?php echo $counter ?> </div>
    <img src="mlm/uploads/<?php echo $prod_img_array['image_name']?>">
  </div>
<?php } ?>


   <div class="row">

<?php

    $product_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' LIMIT 4");
    $counter = 1;
    $array_rows = mysqli_num_rows($product_images);
  
        for($i=1; $i<=$array_rows; $i++){
        $thumbnails = mysqli_fetch_array($product_images);
    
?>   

   <div class="column">
    <img class="demo cursor" src="mlm/uploads/<?php echo $thumbnails['image_name'] ?>" style="width:100%" onclick="currentSlide(<?php echo $counter ?>)" alt="1">
    </div>
  <?php

      $counter++;
 
        }
 
?>

  </div>
</div>
        
        <div class="col-lg-5">
        <div class="quickview-content">

                    <!-- Product Name -->
                    <h2> <?php echo $row['prod_name'] ?> </h2> 
                    <div class="quickview-ratting-review">
                        <div class="quickview-ratting-wrap">
                            <div class="quickview-ratting">
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="yellow fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <a href="#"> (1 customer review)</a>
                        </div>
                        <div class="quickview-stock">
                            <span><i class="fa fa-check-circle-o"></i> in stock</span>
                        </div>
                    </div>
                    <h3> <?php echo number_format($row['prod_price']) ?> </h3>
                    
                    <div class="quickview-peragraph">
                        <p> <?php echo $row['prod_desc'] ?> </p>
                    </div>

 

                    <div class="size">
                        <div class="row">
                            <div class="col-lg-6 col-12 new-size">
                                <h5 class="title">Size</h5>
                                <select>
                                    <option selected="selected">s</option>
                                    <option>m</option>
                                    <option>l</option>
                                    <option>xl</option>
                                </select>
                            </div>
                                               
   
                            <div class="col-lg-5 col-12">
                            
                                <h5 class="title">Color</h5>


                        <!-- START FORM -->
                    <form action="add-cart.php" method="POST">
                    
                              <!-- COLORS DROPDOWN -->
                                <select name="color">
                                    <option selected="selected">orange</option>
                                    <option>purple</option>
                                    <option>black</option>
                                    <option>pink</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="quantity">
                        <p class="title">Quantity</p>

                        <!-- Input Order -->
                        <div class="input-group mb-3">
                            <div class="button minus">
                            <!-- minus button -->
                                <button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
                                    <i class="ti-minus"></i>
                                </button>
                            </div>

                            <!-- Quanity Input -->
                            <input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">

                          <!-- Plus button -->
                            <div class="button plus">
                                <button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
                                    <i class="ti-plus"></i>
                                </button>
                            </div>
                        </div>
                        <!--/ End Input Order -->
                    </div>

                    <div class="add-to-cart">
                        <input type="hidden" name="prod_id" value="<?php echo $product_id ?>">
                        <input href="#" class="btn" style="border-radius: 10px; " name="submit" type="submit" value="Add To Cart" >
                        <a href="#" class="btn min "  style="border-radius: 10px;"><i class="ti-heart"></i></a>
                    </div>
                    </form>
                    <!-- END FORM-->


                    <div class="default-social">
                        <h4 class="share-now">Share:</h4>
                        <ul>
                            <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a class="youtube" href="#"><i class="fa fa-pinterest-p"></i></a></li>
                            <li><a class="dribbble" href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
        </div>



    </div>
</div>
<div class="container">
    <div class="row">
    
    <div class="col-md-9">
      <div class="accordion" id="accordionExample">

  <!-- START SPECIFICATIONS -->
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Specifications
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <?php echo $row['specifications'] ?>       
      </div>
    </div>
  </div>
<!-- END SPECIFICATIONS -->

  <!-- START RATINGS AND REVIEWS -->
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Ratings & Reviews
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">

<!-- Ratints Container -->
    <div class="container">
    			
		<div class="row">
			<div class="col-sm-6">
				<div class="rating-block">
					<h4>Average User Rating</h4>
					<h2 class="bold mt-4">4.3 <small>/ 5</small></h2>

                            <div class="rating-stars">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star-half-alt text-warning"></i>
                            </div>
 
				</div>
			</div>
			<div class="col-sm-6">
				<h4>Rating breakdown</h4>

				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">5 <i class="fa fa-star"></i></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 100%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">1</div>
				</div>

				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">4 <i class="fa fa-star"></i></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">1</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">3 <i class="fa fa-star"></i></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar bg-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">0</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">2 <i class="fa fa-star"></i></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">0</div>
				</div>
				<div class="pull-left">
					<div class="pull-left" style="width:35px; line-height:1;">
						<div style="height:9px; margin:5px 0;">1 <i class="fa fa-star"></i></div>
					</div>
					<div class="pull-left" style="width:180px;">
						<div class="progress" style="height:9px; margin:8px 0;">
						  <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
							<span class="sr-only">80% Complete (danger)</span>
						  </div>
						</div>
					</div>
					<div class="pull-right" style="margin-left:10px;">0</div>
				</div>
			</div>			
		</div>			
		
		<div class="row">
			<div class="col-sm-12">
				<hr/>
				<div class="review-block">
					<div class="row">
						<div class="col-sm-4 mb-3">
							<div class="review-block-name mb-2"> <h6><a href="#"> Derrick Tab</a></h6></div>
                            <div> <i class="far fa-check-circle text-success"></i> Verified Buyer </div>
							<div class="review-block-date">January 29, 2024</div>
						</div>
						<div class="col-sm-8">

                            <div class="rating-stars">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                            </div>

							<div class="review-block-title">I really love it</div>
							<div class="review-block-description">this was nice in buy. this was nice in buy. this was nice in buy. this was nice in buy this was nice in buy this was nice in buy this was nice in buy this was nice in buy</div>
						</div>

                        
					</div>
					<hr/>

				</div>
			</div>
		</div>
		
    </div> <!-- /Ratings container -->

</div>
</div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- ACCORDION END -->




	<!-- Start Related Items -->
<div class="product-area most-popular section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2> Related Items </h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-12">
				<div class="owl-carousel popular-slider">

				<?php 
				$prod_category = $row['category'];

				$random_prod_query = mysqli_query($con, "SELECT * FROM products WHERE category = '$prod_category' ORDER BY RAND()");

				if($random_prod_query){
					while($random_prod_array = mysqli_fetch_array($random_prod_query)){

						$random_prod_id = $random_prod_array['prod_id'];
						$image_query = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$random_prod_id'");
						$images_array = mysqli_fetch_array($image_query);
						$image_name = $images_array['image_name'];
				?>
				
						<!-- Start Single Product -->
						<div class="single-product mb-3 pb-0" style="border-radius: 10px; max-width: 80%;">
							<div class="product-img"  style="border-radius: 10px; height:350px ">
								<a href="product-details.php?p=<?php echo $random_prod_id ?>">
									<img class="default-img" src="mlm/uploads/<?php echo $image_name ?>" alt="#">
								</a>

								<div class="product-content">
								<h3><a href="product-details.php?p=<?php echo $random_prod_id ?>"><?php echo $random_prod_array['prod_name'] ?> </a></h3>
								<div class="product-price">
								<strong> UGX <?php echo number_format($random_prod_array['prod_price']); ?> </strong>
								</div>

           	<div class="button-head">
						<div class="product-action">
							
							<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
							<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
						</div>



					</div>

								</div>


          
						<div class="product-action-2">
							<button class="cart_button">
							<a href="product-details.php?p=<?php echo $random_prod_id ?>" title="Add to Cart" href="#">
								<span>ADD TO CART</span>
							</a>
							</button>
						</div>	

							</div>

   												

						</div>



						<!-- End Single Product -->
						
						<?php }} ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Related  -->




    </div>

  </div>

<script>
function displayAlert(){
  var alert = document.getElementById("alert-row");
  alert.style.display = "block";
}

</script>


<script>
var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>





<?php include "footer.php" ?>

<!-- Jquery -->
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.0.js"></script>
<script src="js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="js/colors.js"></script>
<!-- Slicknav JS -->
<script src="js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="js/magnific-popup.js"></script>
<!-- Fancybox JS -->
<script src="js/facnybox.min.js"></script>
<!-- Waypoints JS -->
<script src="js/waypoints.min.js"></script>
<!-- Jquery Counterup JS -->
<script src="js/jquery-counterup.min.js"></script>
<!-- Countdown JS -->
<script src="js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<script src="js/nicesellect.js"></script>
<!-- Ytplayer JS -->
<script src="js/ytplayer.min.js"></script>
<!-- Flex Slider JS -->
<script src="js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="js/easing.js"></script>
<!-- Google Map JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>	
<script src="js/gmap.min.js"></script>
<script src="js/map-script.js"></script>
<!-- Active JS -->
<script src="js/active.js"></script>
</body>
</html>



