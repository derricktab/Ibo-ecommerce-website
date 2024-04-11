
<?php	include "header.php"; ?>
<?php	include "dbcon.php"; ?>
<title>Home | IBO</title>
<script>
$(document).on("load", function(){
$("#home").addClass("active");
});

</script>

<style>

.image_wrapper{
overflow: hidden;
display: inline-block;
height: auto;
}

.tab-1{
height:400px;
z-index: 2;
background-image: 
linear-gradient(
rgba(0, 0, 0, 0.5),
rgba(0, 0, 0, 0.5)
),
url(img/men.jpg);
background-size: auto;


}

.tab-2{
height:400px;
z-index: 2;
background-image: 
linear-gradient(
rgba(0, 0, 0, 0.5),
rgba(0, 0, 0, 0.5)
),
url(img/cloths.jpg);
background-size: auto;


}

.tab-3{
height:400px;
z-index: 2;
background-image: 
linear-gradient(
rgba(0, 0, 0, 0.5),
rgba(0, 0, 0, 0.5)
),
url(img/shoe.jpg);
background-size: auto;

}

.carousel .carousel-inner .carousel-item {
height: 480px !important;
}

.carousel .carousel-inner .carousel-item img {
position: absolute;
top: 0;
left: 0;
min-height: 600px;
}

.carousel-caption h5, p{
color: black;
}
.cart_button{
padding:10px !important;
background-color: #F7941D !important;
border-radius: .2rem;
}

@media(max-width: 720px){
.carousel .carousel-inner .carousel-item{
height: 360px !important;
}
.carousel .carousel-item img{
max-height: 350px;
}
}
</style>

<!-- Slider Area -->
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-touch="true">
<ol class="carousel-indicators">
<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ></li>
<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
</ol>
<div class="carousel-inner">
<div class="carousel-item active">
<img class="d-block w-100" src="img/1.jpg" alt="First slide">
<div class="carousel-caption d-md-block">
	<h5>WELCOME TO IBO</h5>
	<p>The Best Prices In Town</p>
</div>		
</div>

<div class="carousel-item">
<img class="d-block w-100" src="img/phone1.jpg" alt="Second slide">
<div class="carousel-caption d-md-block">
	<h5>WELCOME TO IBO</h5>
	<p>The Best Prices In Town</p>
</div>		
</div>

<div class="carousel-item">
<img class="d-block w-100" src="img/phone.jpg" alt="Third slide">

<div class="carousel-caption d-md-block">
	<h5>WELCOME TO IBO</h5>
	<p>The Best Prices In Town</p>
</div>
</div>


</div>



<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
<span class="carousel-control-prev-icon" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
<span class="carousel-control-next-icon" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
<!--/ End Slider Area -->

<!-- Start Small Banner  -->
<section class="small-banner section">
<div class="container-fluid">
<div class="row">
	<!-- Single Banner  -->
	<div class="col-lg-4 col-md-6 col-12">
		<div class="single-banner tab-1">
			<div class="content">
				<p>Man's Collectons</p>
				<h3 style="color: white;" >Cool Men's trending <br> Clothings</h3>
				<a style="color: white;" href="catalog.php?c=fashion">Shop Now</a>
			</div>
		</div>
	</div>
	<!-- /End Single Banner  -->
<!--  -->
	<!-- Single Banner  -->
	<div class="col-lg-4 col-md-6 col-12">
		<div class="single-banner tab-2">
			<div class="content">
				<p>Women's Collectons</p>
				<h3 style="color: white;">Awesome Women <br> Clothinds</h3>
				<a style="color: white;" href="catalog.php?c=fashion">Shop Now</a>
			</div>
		</div>
	</div>
	<!-- /End Single Banner  -->
	<!-- Single Banner  -->
	<div class="col-lg-4 col-12">
		<div class="single-banner tab-3">
			<div class="content">
				<p>Shoe Collection</p>
				<h3 style="color: white;">Men and Women <span>Shoes</span> </h3>
				<a style="color: white;" href="catalog.php?c=shoes">Shop Now</a>
			</div>
		</div>
	</div>
	<!-- /End Single Banner  -->
</div>
</div>
</section>
<!-- End Small Banner -->

<!-- Start Product Area -->
<div class="product-area section">
<div class="container">
	<div class="row">
		<div class="col-12">
			<div class="section-title">
				<h2>Trending Items</h2>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-12">
			<div class="product-info">
				<div class="nav-main">
					<!-- Tab Nav -->
					<ul class="nav nav-tabs" id="myTab" role="tablist">

						<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#electronics" role="tab" aria-controls="electronics" aria-selected="true" id="nav-electronics-tab">Electronics</a></li>

						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#fashion" role="tab" aria-controls="fashion" aria-selected="false" id="nav-fashion-tab">Fahion And Clothing</a></li>

						<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#jewerly" role="tab" aria-controls="jewerly" aria-selected="false" id="nav-jewerly-tab">Jewerly</a></li>

					</ul>
					<!--/ End Tab Nav -->
				</div>
				
<div class="tab-content" id="myTabContent">
<!-- ELECTRONICS -->
<div class="tab-pane fade show active" id="electronics" role="tabpanel" aria-labelledby="nav-electronics-tab" >
<div class="tab-single">
	<div class="row">
		
<?php 
//Fetching products from the database

$query = mysqli_query($con, "SELECT * FROM products WHERE category='electronics'");
		
if($query){

	while($row = mysqli_fetch_array($query)){
		
		$product_id = $row['prod_id'];

		//	Fetching product images from the database
		$prod_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' LIMIT 3 ");
		$prod_img_array = mysqli_fetch_array($prod_images);
		
	
?>

<!-- PRODUCT CARD START -->
<div class="col-md-2" >
	<div class="single-product">
		<div class="product-img"  style="border-radius: 7px">
			<a href="product-details.php?p=<?php echo $product_id ?>">
				<img class="default-img" src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#" width="100px">
			</a>
		
			<div class="product-content">
			<h3> <a href="product-details.php?p=<?php echo $product_id ?>" > <?php echo $row['prod_name'] ?> </a></h3>
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
<!-- PRODUCT CART END -->


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
				<!-- Product Slider -->
					<div class="product-gallery">
						<div class="quickview-slider-active">

	<?php

		$product_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' ");

		$array_rows = mysqli_num_rows($product_images);
	
			for($i=1; $i<=$array_rows; $i++){
			$thumbnails = mysqli_fetch_array($product_images);
		
	?>   

			<div class="single-slider">
				<img src=<?php echo "mlm/uploads/".$thumbnails['image_name']; ?> alt="#">
			</div>
			
			<div class="single-slider">
				<img src=<?php echo "mlm/uploads/".$thumbnails['image_name']; ?> alt="#">
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
						<h6>Product Details</h6>
						<p> <?php echo $row['prod_desc'] ?> </p>
					</div>
					<div class="size">
						<div class="row">
							<div class="col-lg-6 col-12">
								<h5 class="title">Size</h5>
								<select>
									<option selected="selected">s</option>
									<option>m</option>
									<option>l</option>
									<option>xl</option>
								</select>
							</div>
							<div class="col-lg-6 col-12">
								<h5 class="title">Color</h5>
								<select>
									<option selected="selected">orange</option>
									<option>purple</option>
									<option>black</option>
									<option>pink</option>
								</select>
							</div>
						</div>
					</div>

				<form action="add-cart.php" method="post">
					<div class="quantity">
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


					<div class="add-to-cart">
						<input type="hidden" name="prod_id" value="<?php echo $product_id ?>">
						<input class="btn" type="submit" name="submit" value="Add To Cart">
						<a href="#" class="btn min"><i class="ti-heart"></i></a>
						<a href="#" class="btn min" data-dismiss="modal"><i class="fa fa-compress"></i></a>
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




						<!-- closing the while loop and if statement-->
						<?php }} ?>

							</div>
						</div>
					</div>
					<!--/ END ELECTRONICS -->



					<!-- FASHION-->
					<div class="tab-pane fade show" id="fashion" role="tabpanel" aria-labelledby="nav-fashion-tab">
						<div class="tab-single">
							<div class="row">
								
						<?php 
						//Fetching products from the database

						$query = mysqli_query($con, "SELECT * FROM products WHERE category ='fashion' ");
								
						if($query){

							while($row = mysqli_fetch_array($query)){
								
								$product_id = $row['prod_id'];

								//	Fetching product images from the database
								$prod_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' ");

								$prod_img_array = mysqli_fetch_array($prod_images);
							
						?>
						<div class="col-md-2">
									<div class="single-product"  style="border-radius: 10px">
										<div class="product-img"  style="border-radius: 10px">
											<a href="product-details.php?p=<?php echo $product_id ?>">
												<img class="default-img" src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#" width="100px">
											</a>
										
											<div class="product-content">
											<h3><a href="product-details.php?p=<?php echo $product_id ?>"> <?php echo $row['prod_name'] ?> </a></h3>
											<div class="product-price">
												<span><strong><?php echo "UGX ".number_format($row['prod_price']); ?></strong></span>
											</div>
										</div>

											<div class="button-head">
												<div class="product-action">
													
													<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
													<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
												</div>
												<div class="product-action-2">
													<button class="cart_button">
													<a data-toggle="modal" data-target="#exampleModal<?php echo $product_id ?>" title="Buy Now" href="#">Buy Now</a>
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
				<!-- Product Slider -->
					<div class="product-gallery">
						<div class="quickview-slider-active">
							<div class="single-slider">
								<img src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#">
							</div>
							<div class="single-slider">
								<img src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#">
							</div>
							<div class="single-slider">
								<img src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#">
							</div>
							
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
						<p> <?php echo $row['prod_desc'] ?> </p>
					</div>
					<div class="size">
						<div class="row">
							<div class="col-lg-6 col-12">
								<h5 class="title">Size</h5>
								<select>
									<option selected="selected">s</option>
									<option>m</option>
									<option>l</option>
									<option>xl</option>
								</select>
							</div>
							<div class="col-lg-6 col-12">
								<h5 class="title">Color</h5>
								<select>
									<option selected="selected">orange</option>
									<option>purple</option>
									<option>black</option>
									<option>pink</option>
								</select>
							</div>
						</div>
					</div>
					<form action="add-cart.php" method="post">
					<div class="quantity">
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
					<div class="add-to-cart">
						<input type="hidden" name="prod_id" value="<?php echo $product_id ?>">
						<input type="submit" value="Add To Cart" href="#" class="btn">
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


						<!-- closing the while loop and if statement-->
						<?php }} ?>

							</div>
						</div>
					</div>
					<!--/ End FASHION -->



					<!-- JEWERLY -->
					<div class="tab-pane fade show" id="jewerly" role="tabpanel" aria-labelledby="nav-jewerly-tab">
						<div class="tab-single">
							<div class="row">
								
						<?php 
						//Fetching products from the database

						$query = mysqli_query($con, "SELECT * FROM products WHERE category='jewerly' ");
								
						if($query){

							while($row = mysqli_fetch_array($query)){
								
								$product_id = $row['prod_id'];

								//	Fetching product images from the database
								$prod_images = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$product_id' ");

								$prod_img_array = mysqli_fetch_array($prod_images);
							
						?>
						<div class="col-md-2">
									<div class="single-product">
										<div class="product-img">
											<a href="product-details.php?p=<?php echo $product_id ?>">
												<img class="default-img" src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#" width="100px">
											</a>
										
											<div class="product-content">
											<h3><a href="product-details.php?p=<?php echo $product_id ?>"> <?php echo $row['prod_name'] ?> </a></h3>
											<div class="product-price">
												<span><strong><?php echo "UGX ".number_format($row['prod_price']); ?></span>
											</div>
										</div>

											<div class="button-head">

												<div class="product-action-2">
													<button class="cart_button">
													<a data-toggle="modal" data-target="#exampleModal<?php echo $product_id ?>" title="Buy Now" href="#">Buy Now</a>
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
				<!-- Product Slider -->
					<div class="product-gallery">
						<div class="quickview-slider-active">
							<div class="single-slider">
								<img src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#">
							</div>
							<div class="single-slider">
								<img src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#">
							</div>
							<div class="single-slider">
								<img src=<?php echo "mlm/uploads/".$prod_img_array['image_name']?> alt="#">
							</div>
							
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
						<p> <?php echo $row['prod_desc'] ?> </p>
					</div>
					<div class="size">
						<div class="row">
							<div class="col-lg-6 col-12">
								<h5 class="title">Size</h5>
								<select>
									<option selected="selected">s</option>
									<option>m</option>
									<option>l</option>
									<option>xl</option>
								</select>
							</div>
							<div class="col-lg-6 col-12">
								<h5 class="title">Color</h5>
								<select>
									<option selected="selected">orange</option>
									<option>purple</option>
									<option>black</option>
									<option>pink</option>
								</select>
							</div>
						</div>
					</div>
					<form action="add-cart.php" method="post">
					<div class="quantity">
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
					<div class="add-to-cart">
						<input type="hidden"  name="prod_id" value="<?php echo $product_id ?>">
						<input class="btn" type="submit" name="submit" value="Add To Cart">
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

						<!-- closing the while loop and if statement-->
						<?php }} ?>

							</div>
						</div>
					</div>
					<!--/ End JEWERLY -->


				</div>
			</div>
		</div>
	</div>
</div>
</div>
<!-- End Product Area -->

<!-- Start Midium Banner  -->
<section class="midium-banner">
<div class="container">
<div class="row">
	<!-- Single Banner  -->
	<div class="col-lg-6 col-md-6 col-12">
		<div class="single-banner h-60">
			<img src="images\card1.jpg" alt="#" width="100%" >
			<div class="content pt-5 h-100 w-100" style="background-color: rgba(0,0,0,0.6);">
				<h3 class="text-warning mb-3"> IBO Smart VIP Card</h3>
				<p class="text-white">Access More Services and privileges with our<br>Smart and Secure<span> Credit Card</span></p>
				<a href="services.php">Learn More</a>
			</div>
		</div>
	</div>
	<!-- /End Single Banner  -->
	<!-- Single Banner  -->
	<div class="col-lg-6 col-md-6 col-12">
		<div class="single-banner">
			<img src="images\package.jpg" alt="#" height="40px">
			<div class="content h-100 w-100 pt-5" style="background-color: rgba(0,0,0,0.6);">
				<h3 class="text-warning mb-3">IBO Package</h3>
				<p class="text-white">Get a package that includes all the IBO branding materials and alot others <br> Its also necessary if you are to become our  <span>Agent</span></p>
				<a href="services.php#package" class="btn">Learn More</a>
			</div>
		</div>
	</div>
	<!-- /End Single Banner  -->
</div>
</div>
</section>
<!-- End Midium Banner -->

<!-- Start Most Popular -->
<div class="product-area most-popular section">
<div class="container">
<div class="row">
	<div class="col-12">
		<div class="section-title">
			<h2>Hot Items</h2>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-12">
	<div class="owl-carousel popular-slider">

	<?php 
	
	$random_prod_query = mysqli_query($con, "SELECT * FROM products ORDER BY RAND()");
	if($random_prod_query){
		while($random_prod_array = mysqli_fetch_array($random_prod_query)){

			$random_prod_id = $random_prod_array['prod_id'];
			$image_query = mysqli_query($con, "SELECT * FROM prod_images WHERE prod_id='$random_prod_id'");
			$images_array = mysqli_fetch_array($image_query);
			$image_name = $images_array['image_name'];
	?>
	
			<!-- Start Single Product -->
			<div class="single-product mb-4">
				<div class="product-img"  style="border-radius: 20px;">
					<a href="product-details.php?p=<?php echo $random_prod_id ?>">
						<img class="default-img" src="mlm/uploads/<?php echo $image_name ?>" alt="#">
						<span class="out-of-stock">Hot</span>
					</a>

					<div class="product-content">
					<h3><a href="product-details.php?p=<?php echo $random_prod_id ?>"><?php echo $random_prod_array['prod_name'] ?> </a></h3>
					<div class="product-price">
						<span> <strong> UGX <?php echo number_format($random_prod_array['prod_price']); ?> </strong> </span>
					</div>
					</div>

				<div class="button-head">
						<div class="product-action">
							
							<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
							<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
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
										

			</div>



			<!-- End Single Product -->
			
			<?php }} ?>
		</div>
	</div>
</div>
</div>
</div>
<!-- End Most Popular Area -->






<!-- Start Shop Services Area -->
<section class="shop-services section home">
<div class="container">
<div class="row">
	<div class="col-lg-3 col-md-6 col-12">
		<!-- Start Single Service -->
		<div class="single-service">
			<i class="ti-rocket"></i>
			<h4>Free shiping</h4>
			<p>Orders over Ush 100,000</p>
		</div>
		<!-- End Single Service -->
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<!-- Start Single Service -->
		<div class="single-service">
			<i class="ti-reload"></i>
			<h4>Guarantee</h4>
			<p>30 days money back guarantee</p>
		</div>
		<!-- End Single Service -->
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<!-- Start Single Service -->
		<div class="single-service">
			<i class="ti-lock"></i>
			<h4>Sucure Payment</h4>
			<p>100% secure payment</p>
		</div>
		<!-- End Single Service -->
	</div>
	<div class="col-lg-3 col-md-6 col-12">
		<!-- Start Single Service -->
		<div class="single-service">
			<i class="ti-tag"></i>
			<h4>Best Price</h4>
			<p>Guaranteed price</p>
		</div>
		<!-- End Single Service -->
	</div>
</div>
</div>
</section>
<!-- End Shop Services Area -->


<script>  
$(document).ready(function(){  
$('.cart_button').click(function(){  
var product_id = $(this).attr("id");  
$.ajax({  
	url:"select.php",  
	method:"post",  
	data:{product_id:product_id},  
	success:function(data){  
			$('#product_details').html(data);  
			$('#exampleModal').modal("show");  
	}  
});  
});  
});  
</script>


<script>
window.onload = function() {
$("#home").addClass("active");
};
</script>

<?php
include "footer.php";
?>


<!-- Jquery -->
<script src="store/js/jquery.min.js"></script>
<script src="store/js/jquery-migrate-3.0.0.js"></script>
<script src="store/js/jquery-ui.min.js"></script>
<!-- Popper JS -->
<script src="store/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="store/js/bootstrap.min.js"></script>
<!-- Color JS -->
<script src="store/js/colors.js"></script>
<!-- Slicknav JS -->
<script src="store/js/slicknav.min.js"></script>
<!-- Owl Carousel JS -->
<script src="store/js/owl-carousel.js"></script>
<!-- Magnific Popup JS -->
<script src="store/js/magnific-popup.js"></script>
<!-- Fancybox JS -->
<script src="store/js/facnybox.min.js"></script>
<!-- Waypoints JS -->
<script src="store/js/waypoints.min.js"></script>
<!-- Jquery Counterup JS -->
<script src="store/js/jquery-counterup.min.js"></script>
<!-- Countdown JS -->
<script src="store/js/finalcountdown.min.js"></script>
<!-- Nice Select JS -->
<!-- Ytplayer JS -->
<script src="store/js/ytplayer.min.js"></script>
<!-- Flex Slider JS -->
<script src="store/js/flex-slider.js"></script>
<!-- ScrollUp JS -->
<script src="store/js/scrollup.js"></script>
<!-- Onepage Nav JS -->
<script src="store/js/onepage-nav.min.js"></script>
<!-- Easing JS -->
<script src="store/js/easing.js"></script>
<!-- Google Map JS -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnhgNBg6jrSuqhTeKKEFDWI0_5fZLx0vM"></script>	
<script src="store/js/gmap.min.js"></script>
<script src="store/js/map-script.js"></script>
<!-- Active JS -->
<script src="store/js/active.js"></script>
</body>
</html>



