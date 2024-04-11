<?php include "header.php" ?>
<?php include "dbcon.php" ?>

<title>Shop</title>

<style>
.main-category{
display: none !important;
}
.drop-cat:hover .main-category{
display: block !important;
}
</style>
	
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="index.php">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="#">Shop Grid</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
	
	

	<!-- Product Style -->
	<section class="product-area shop-sidebar shop section">
		<div class="container">
			<div class="row">

				<div class="col-lg-9 col-md-8 col-12">
					<div class="row">
						<div class="col-12">
							<!-- Shop Top -->
							<div class="shop-top">
								<div class="shop-shorter">
									<div class="single-shorter">
										<label>Show :</label>
										<select>
											<option selected="selected">09</option>
											<option>15</option>
											<option>25</option>
											<option>30</option>
										</select>
									</div>
									<div class="single-shorter">
										<label>Sort By :</label>
										<select>
											<option selected="selected">Name</option>
											<option>Price</option>
											<option>Size</option>
										</select>
									</div>
								</div>
								<ul class="view-mode">
									<li class="active"><a href="#"><i class="fa fa-th-large"></i></a></li>
									<li><a href="#"><i class="fa fa-th-list"></i></a></li>
								</ul>
							</div>
							<!--/ End Shop Top -->
						</div>
					</div>


				<div class="row">


					<?php 
							//Fetching products from the database
							$message = "";
													
						$query = mysqli_query($con, "SELECT * FROM products");

						// CHECKING WHICH PAGE THE USER IS ON
							if(isset($_POST['page'])){
								$page = htmlentities($_POST['page'], ENT_QUOTES, "UTF-8");
							}
							elseif(isset($_POST['prev'])){
								$page = $page-1;
							}
							elseif(isset($_POST['next'])){
								$page = htmlentities($_POST['page'], ENT_QUOTES, "UTF-8");
								echo "THE SCRIPT HAS BEEN EXECUTED";
							}
							else{
								$page = 1;
							}

						// PAGINATION CODES
							$products_per_page = 4;
							$first_product = (($page-1)*$products_per_page);
							$number_of_pages = (mysqli_num_rows($query))/$products_per_page;
							$number_of_pages = ceil($number_of_pages); //Rounding Off

						
						// PRODUCT SEARCH
							if(isset($_POST['search'])){

							$search_query = mysqli_real_escape_string($con, $_POST['search-query']);

							$query = "SELECT * FROM products WHERE prod_name LIKE '%$search_query%' or category LIKE '%$search_query%' LIMIT $first_product,$products_per_page";

							$query = mysqli_query($con, $query);
							$number_of_rows = mysqli_num_rows($query);
							if($number_of_rows == 0){
								$message = "No Products Match Your Search, Please Try Another Word ";
							}
							else{
								echo "
								<div class='row pt-3'>
								<div class='ml-3 pl-3 mb-0'><span class='font-weight-bold'>$number_of_rows</span> Products Found</div>
								</div>
								";
							}
								echo "<h6 class='text-center mt-5 ml-5 mb-5 pb-5'> $message </h6>";
							}
							elseif(isset($_GET["c"])){
								$get_category = mysqli_real_escape_string($con, $_GET["c"]);
								$query = mysqli_query($con, "SELECT * from products WHERE category='$get_category' LIMIT $first_product,$products_per_page");
							}

							else{
							$query = mysqli_query($con, "SELECT * FROM products LIMIT $first_product,$products_per_page");
							}


							if($query){

								while($row = mysqli_fetch_array($query)){
									
									$product_id = $row['prod_id'];

									//	Fetching product images from the database
									$prod_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' ");

									$prod_img_array = mysqli_fetch_array($prod_images);
								
							?>


					<div class="col-lg-3 col-md-3 col-12 prod-item"  style="border-radius: 10px">
						<div class="single-product" style="border-radius: 10px">
						<div class="product-img"  style="border-radius: 10px">
							<a href="product-details.php?p=<?php echo $product_id ?>">
								<img class="default-img" src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#" width="100px">
							</a>
						
							<div class="product-content">
							<h3><a href="product-details.php?p=<?php echo $product_id ?>"> <?php echo $row['prod_name'] ?> </a></h3>
							<div class="product-price">
							
								<span><strong> <?php echo "UGX ".number_format($row['prod_price']); ?> </strong></span>
							</div>
						</div>

							<div class="button-head">
								<div class="product-action">
									
									<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
									<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
								</div>
								<div class="product-action-2">
									<button class="cart_button">
									<a data-toggle="modal" data-target="#exampleModal<?php echo $product_id ?>" title="Buy Now" href="#" >Buy Now</a>
									</button>

								</div>
							</div>
						</div>
						
					</div>
					</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?php echo $product_id ?>" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span class="ti-close" aria-hidden="true"></span></button>
			</div>
			<div class="modal-body" id="product_details">
				<div class="row no-gutters">
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
						<div class="product-gallery">
							<div class="quickview-slider-active">
						<!-- Product Slider -->
						<?php

							$product_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' ");

							$array_rows = mysqli_num_rows($product_images);
						
							while($thumbnails = mysqli_fetch_array($product_images)){
					
						?>


									<div class="single-slider">
									<img src=<?php echo "mlm/uploads/".$thumbnails['image_name']?> alt="#">
									</div>

									<div class="single-slider">
									<img src=<?php echo "mlm/uploads/".$thumbnails['image_name']?> alt="#">
									</div>

				
							<?php } ?>

							</div>
							</div>


						<!-- End Product slider -->

					</div>
					<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
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
							<h3> <?php echo "UGX ".number_format($row['prod_price']); ?> </h3>
							
							<div class="quickview-peragraph">
								<p> <?php echo $row['prod_desc']  ?> </p>
							</div>


							<form action="add-cart.php" method="post">
							<div class="size">
								<div class="row">
									<div class="col-lg-12 col-12">
										<h5 class="title">Color</h5>
										<select class="w-100" name="color">
											<option selected="selected">orange</option>
											<option>purple</option>
											<option>black</option>
											<option>pink</option>
										</select>
									</div>
								</div>
							</div>

							<div class="quantity">
								<div class="mb-2">Quantity</div>
								<!-- Input Order -->
								<div class="input-group">
									<div class="button minus">
										<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
											<i class="ti-minus"></i>
										</button>
									</div>
									<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="1000" value="1">
									<div class="button plus">
										<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
											<i class="ti-plus"></i>
										</button>
									</div>
								</div>
								<!--/ End Input Order -->
								
							</div>
							<br>
							<div class="add-to-cart mt-4">
								<input type="hidden" name="prod_id" value="<?php echo $product_id ?>">
								<input type="submit" name="submit" class="btn" value="Add To Cart">
								
								<a href="#" class="btn min"><i class="ti-heart"></i></a>
								<a href="#" class="btn min"><i class="fa fa-compress"></i></a>
							</div>
							</form>

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
		</div>
	</div>
</div>
<!-- Modal end -->
						<?php }} ?>



					</div>



		<!-- PAGINATION -->

	<div class="row pt-5 mr-auto justify-content-center">
		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">
			<?php
			if($page==1){
				$previous_status = "disabled";
			}
			elseif($page == $number_of_pages){
				$next_status = "disabled";
			}
			else{
				$next_status = "";
				$previous_status = "";
			}

			
			?>

			<form action="" method="post">
			<li class="page-item <?php echo $previous_status ?>">
				<input type="submit" name="prev" class="page-link" tabindex="-1" value="Prev" >
			</li>
			</form>

			<?php
			
			for($current_page=1; $current_page<=$number_of_pages; $current_page++){ ?>
			<li class="page-item h-100">
				<!-- CHECKING WHICH PAGE WE ARE ON -->
				<?php 
				if($current_page == $page){
					$page_status = "active-page";
				}
				else{
					$page_status ="";
				}
				?>
				<form action="" method="post">
					<input type="submit" value="<?php echo $current_page ?>" name="page" class="page-link <?php echo $page_status ?> ">
				</form>
				</li>
			<?php } ?>

			<form action="catalog.php" method="post">
			<li class="page-item <?php echo $next_status ?>">
				<input type="hidden" name="page" value="<?php echo $current_page ?>">
				<input type="submit" class="page-link" name="next" value="Next" >
			</li>
			</form>

			</ul>
		</nav>		
	</div>

	</div>


				<div class="col-lg-3 col-md-4 col-12">
					<div class="shop-sidebar mobile-side">
							<!-- Single Widget -->
							<div class="single-widget category">
								<h3 class="title">Categories</h3>
								<ul class="categor-list">

								<!--DISPLAY CATEGORIES FROM DATABASE  -->
								<?php 
								$cat_query = mysqli_query($con, "SELECT * FROM category LIMIT 8");

								while($row=mysqli_fetch_array($cat_query)){
								?>

								<li><a href="catalog.php?c=<?php echo $row['cat_name'] ?>"> <?php echo  $row['cat_name']; ?> </a></li>
							<?php } ?>

								</ul>
							</div>
							<!--/ End Single Widget -->

							<!-- Shop By Price -->
								<div class="single-widget range">
									<h3 class="title">Shop by Price</h3>
									<div class="price-filter">
										<div class="price-filter-inner">
											<div id="slider-range"></div>
												<div class="price_slider_amount">
												<div class="label-input">
													<span>Range:</span><input type="text" id="amount" name="price" placeholder="Add Your Price"/>
												</div>
											</div>
										</div>
									</div>
									<ul class="check-box-list">
										<li>
											<label class="checkbox-inline" for="1"><input name="news" id="1" type="checkbox">UGX20 - UGX50</label>
										</li>
										<li>
											<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">UGX50 - UGX100</label>
										</li>
										<li>
											<label class="checkbox-inline" for="3"><input name="news" id="3" type="checkbox">UGX100 - UGX250</label>
										</li>
									</ul>
								</div>
								<!--/ End Shop By Price -->

							<!-- Suppliers -->
							<div class="single-widget category">
								<h3 class="title">Top Suppliers </h3>
								<ul class="categor-list">

									<?php 
								$cat_query = mysqli_query($con, "SELECT supplier FROM products LIMIT 8");

								while($row=mysqli_fetch_array($cat_query)){
								?>

								<li><a href="#"> <?php echo  $row['supplier']; ?> </a></li>
							<?php } ?>
						
								</ul>
							</div>
							<!--/ End Single Widget -->
					</div>
				</div>
				<!-- /END SIDEBAR -->
			</div>
		</div>
	</section>
	<!--/ End Product Style 1  -->	

<script>
window.onload = function() {
$("#products").addClass("active");
};
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
<!-- Active JS -->
<script src="js/active.js"></script>
</body>
</html>