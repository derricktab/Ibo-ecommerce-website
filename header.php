
<?php include 'dbcon.php' ?>
<?php session_start(); ?>

	<!DOCTYPE html>
	<html lang="en">
	<head>
	<!-- Meta Tag -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="img/logo.png">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

	<!-- StyleSheet -->

	<!-- Bootstrap -->
	<link rel="stylesheet" href="store/css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="store/css/magnific-popup.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="store/css/fontawesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="store/css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
	<link rel="stylesheet" href="store/css/themify-icons.css">
	<!-- Nice Select CSS -->
	<link rel="stylesheet" href="store/css/niceselect.css">
	<!-- Animate CSS -->
	<link rel="stylesheet" href="store/css/animate.css">
	<!-- Flex Slider CSS -->
	<link rel="stylesheet" href="store/css/flex-slider.min.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="store/css/owl-carousel.css">
	<!-- Slicknav -->
	<link rel="stylesheet" href="store/css/slicknav.min.css">

	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="store/css/reset.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="store/css/responsive.css">
	<style>


	.logo{
	color: #FF4500 !important;
	}

	.hero-slider .single-slider {
	height: 300px;
	background-image: url('img/1.jpg');
	background-size: cover;
	background-position: center;
	background-repeat: no-repeat;
	height: 510px;
	}

	@media(max-width: 720px){
		.header.shop .logo {
			margin-left: 40px !important;
			margin-top: 15px !important;
			top: 0 !important;
			position: fixed !important;
			font-size: 30px;
			font-weight: 700;
			padding-top: 8px !important;
		}
		.slicknav_nav{
			margin-top: 40px !important;
			border-top: 1px solid gray !important;
		}
	}

	</style>


	</head>
	<body class="js">

	<!-- Preloader -->
	<!-- <div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div> -->
	<!-- End Preloader -->


	<!-- Header -->
	<header class="header shop">

		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2">

						<!-- Hamburger -->
						<div class="mobile-nav">
							
						</div>

						<!-- Logo -->
							<a href="/ibo" class="logo mx-auto">IBO</a>
						<!--/ End Logo -->

						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- MOBILE Search Form -->
							<div class="search-top">
								<form class="search-form" method="POST" action="catalog.php">
									<input type="text" placeholder="Search here..." name="search-query">
									<button value="search" type="submit" name="search"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End MOBILE Search Form -->
						</div>
						<!--/ End Search Form -->
							<?php

								$cart_items_counter = 0;
								
								if(isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])){
								$cart = $_COOKIE['cart'];
								$cart = json_decode($cart, true);

								if(count($cart) >0){
									$cart_items_counter = count($cart);
								}

								}

							?>

						<div class="cart-mobile">
							<a href="cart.php">
								<i class="fa fa-shopping-cart"></i>
								<span class="mobile-count"> <?php echo $cart_items_counter ?> </span>
							</a>
						</div>


					</div>



					<div class="col-lg-8 col-md-7 col-12">
						<div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected">All Categories</option>

									<?php 
									$cat_query = mysqli_query($con, "SELECT * FROM category LIMIT 5");

									while($row=mysqli_fetch_array($cat_query)){
									?>

									<option><a href="#"> <?php echo  $row['cat_name']; ?> </a></option>
								<?php } ?>

								</select>
								<form method="POST" action="catalog.php">
									<input name="search-query" placeholder="Search Products Here....." type="search">
									<button class="btnn" name="search"><i class="ti-search"></i></button>
								</form>
							</div>
						</div>
					</div>

					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">

						
							<!-- Search Form -->

							<div class="sinlge-bar">
								<a href="mlm/dashboard.php" class="single-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></a>
							</div>

							<?php

								$cart_items_counter = 0;
								if(isset($_COOKIE['cart']) && !empty($_COOKIE['cart'])){
								$cart = $_COOKIE['cart'];
								$cart = json_decode($cart, true);

								if(count($cart) >0){
									$cart_items_counter = count($cart);
								}

								}

							?>
							<!--  SHOPPING CART -->
							<div class="sinlge-bar shopping">
								<a href="cart.php" class="single-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="total-count"> <?php echo $cart_items_counter ?> </span></a> <span style="font-size: 15px;">Cart</span>
								<!-- Shopping Item -->


								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo $cart_items_counter ?> Items</span>
										<a href="cart.php">View Cart</a>
									</div>


									<ul class="shopping-list">
									<?php 
									$total = 0;
									for($i=0; $i<$cart_items_counter; $i++){
									$total += $cart[$i]['total_price'];
									?>
										<li>
											<a href="delete-cart.php?p=<?php echo $cart[$i]['product_id'] ?>" class="remove" title="Remove this item"><i class="fa fa-times"></i></a>
											<a class="cart-img" href="product-details.php?p=<?php echo $cart[$i]['product_id'] ?>"><img src="mlm/uploads/<?php echo $cart[$i]['product_image'] ?> " alt="#"></a>
											<h4><a href="#"> <?php echo $cart[$i]['product_name'] ?> </a></h4>
											<p class="quantity"><?php echo $cart[$i]['quantity'] ?> - <span class="amount"> Ush <?php echo number_format($cart[$i]['total_price']) ?> </span></p>
										</li>
									<?php } ?>

									</ul>

									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount"> Ush <?php echo number_format($total) ?> </span>
										</div>
										<form action="checkout.php" method="post">
										<input type="hidden" value="<?php echo $total ?>" name="total">

										<input type="submit" name="checkout" class="btn animate w-100" value="Checkout">
										</form>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>


		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					<div class="row">
						<div class="col-lg-3 drop-cat">
							<div class="all-category">
								<h3 class="cat-heading"><i class="fa fa-bars" aria-hidden="true"></i>CATEGORIES</h3>
								<ul class="main-category">
									
									<li class="main-mega"><a href="#">Best Selling <i class="fa fa-angle-right" aria-hidden="true"></i></a>
										<ul class="mega-menu">
											<li class="single-menu">
												<a href="#" class="title-link">Clothings</a>
												<div class="image">
													<img style = "width:255px; height:155px;" src="img/clothings.jpeg" alt="#">
												</div>
												<div class="inner-link">
													<a href="#">Mens Clothes</a>
													<a href="#">Women Clothes</a>
													<a href="#">Kids Clothes</a>
												</div>
											</li>
											<li class="single-menu">
												<a href="#" class="title-link">Shoes</a>
												<div class="image">
													<img style = "width:255px; height:155px;" src="img/shoes.jpg" alt="#">
												</div>
												<div class="inner-link">
													<a href="#">Men's Shoes</a>
													<a href="#">Women Shoes</a>
													<a href="#">Babies Shoes</a>
												</div>
											</li>
											<li class="single-menu">
												<a href="#" class="title-link">Jewerly</a>
												<div class="image">
													<img style = "width:255px; height:155px;" src="img/jewerly.jpg" alt="#">
												</div>
												<div class="inner-link">
													<a href="#">Necklaces</a>
													<a href="#">Bangles</a>
													<a href="#">Ladies Sun Glass</a>
													<a href="#">Ladies Watch</a>
												</div>
											</li>
										</ul>
									</li>

									<?php 
									$cat_query = mysqli_query($con, "SELECT * FROM category LIMIT 8");

									while($row=mysqli_fetch_array($cat_query)){
									?>
									

									
									<li><a href="catalog.php?c=<?php echo $row['cat_name'] ?>" name="submit_cat"> <?php echo  $row['cat_name']; ?> </a></li>


								<?php } ?>
					
								</ul>
							</div>
						</div>

						<div class="col-lg-8 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav w-100">
													<li id="home"><a href="/ibo/">Home</a></li>
													<li id="products"><a href="catalog.php">Products</a></li>												
													<li id="services"><a href="#">Services <i class="ti-angle-down"></i> </a>
														<ul class="dropdown">
															<li><a href="services.php">IBO Smart Card</a></li>
															<li><a href="services.php#package">IBO Package</a></li>
														</ul>
													
													
													</li>

													<li id="contact"><a href="contact.php">Contact Us</a></li>

													<li><a href="admin">Admin Panel</a></li>									
													<li ><a href="login.php" >
													
													<?php 
													if(isset($_SESSION['id']) || isset($_SESSION['customer_id']) ){
														echo "My Account";
													}
											
													else {
														echo "Login";
													}
													?>
													</a>
														
													</li>
						
												</ul>


										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>


						<div class="col-lg-1">

				<div class="right-bar inline-cart  ">
							<!-- Search Form -->

							<!--  SHOPPING CART -->
							<div class="sinlge-bar shopping">
								<a href="cart.php" class="single-icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="total-count"> <?php echo $cart_items_counter ?> </span></a> <span style="font-size: 15px;">Cart</span>
								<!-- Shopping Item -->


								<div class="shopping-item">
									<div class="dropdown-cart-header">
										<span><?php echo $cart_items_counter ?> Items</span>
										<a href="cart.php">View Cart</a>
									</div>


									<ul class="shopping-list">
									<?php 
									$total = 0;
									for($i=0; $i<$cart_items_counter; $i++){
									$total += $cart[$i]['total_price'];
									?>
										<li>
											<a href="delete-cart.php?p=<?php echo $cart[$i]['product_id'] ?>" class="remove" title="Remove this item"><i class="fa fa-times"></i></a>
											<a class="cart-img" href="product-details.php?p=<?php echo $cart[$i]['product_id'] ?>"><img src="mlm/uploads/<?php echo $cart[$i]['product_image'] ?> " alt="#"></a>
											<h4><a href="#"> <?php echo $cart[$i]['product_name'] ?> </a></h4>
											<p class="quantity"><?php echo $cart[$i]['quantity'] ?> - <span class="amount"> Ush <?php echo number_format($cart[$i]['total_price']) ?> </span></p>
										</li>
									<?php } ?>

									</ul>

									<div class="bottom">
										<div class="total">
											<span>Total</span>
											<span class="total-amount"> Ush <?php echo number_format($total) ?> </span>
										</div>
										<a href="checkout.php" class="btn animate">Checkout</a>
									</div>
								</div>
								<!--/ End Shopping Item -->
							</div>
						</div>

						</div>

					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->

<script>
$("header").scroll(
	function(){
		$(".drop-cat").replaceWith( $(".logo") );
	}
);
</script>