
	<?php 
	
	if(isset($_POST['checkout'])){
		$total = htmlentities($_POST['total'], ENT_QUOTES, "UTF-8");

		$shipping_cost = 0;
		$grand_total = $total + $shipping_cost;
	}
	else{
		header("location: /ibo/");
		
	}

	?>

<?php include "header.php" ?>
	
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
								<li><a href="/ibo/">Home<i class="ti-arrow-right"></i></a></li>
								<li class="active"><a href="#">Checkout</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- End Breadcrumbs -->
				
<!-- Start Checkout -->
<section class="shop checkout section">
	<div class="container">
		<div class="row"> 
			<div class="col-lg-8 col-12">
				<div class="checkout-form">
					<h2>Make Your Checkout Here</h2>
					<p>Please register in order to checkout more quickly</p>
					<!-- Form -->
					<form class="form" method="POST" action="vendor\flutterwavedev\flutterwave-v3\processPayment.php">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>First Name<span>*</span></label>
									<input type="text" name="firstname" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Last Name<span>*</span></label>
									<input type="text" name="lastname" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Email Address<span>*</span></label>
									<input type="email" name="email" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Phone Number<span>*</span></label>
									<input type="number" name="phonenumber" placeholder="" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Country<span>*</span></label>
									<select name="country_name" id="country">
										<option value="UG">Uganda</option>
										<option value="KE">Kenya</option>
										<option value="TZ">Tanzania</option>
										<option value="RW">Rwanda</option>

									</select>
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>City<span>*</span></label>
									<input type="text" name="city" placeholder="City To Deliver" required="required">
								</div>
							</div>
							<div class="col-lg-6 col-md-6 col-12">
								<div class="form-group">
									<label>Address<span>*</span></label>
									<input type="text" name="address" placeholder="" required="required">
								</div>
							</div>


							<div class="col-md-12">
								<div class="form-group create-account">
									<input id="cbox" type="checkbox" onclick="displayRow()">
									<label>Create an account?</label>
								</div>

								<!-- ENTER PASSWORD -->
								<div class="row mt-4 w-100" id="password-hide">
								<div class="col-md-12">
								<div class="form-group">
									<label for="">Password</label>
									<input type="password" name="password1" placeholder="Enter Password Here" class="form-control">
								</div>
								</div>

								<div class="col-md-12">
								<div class="form-group">
									<label for="">Confirm Password</label>
									<input type="password" name="password2" placeholder="Re-enter Password" class="form-control">
								</div>
								</div>
								</div>

							</div>
						</div>
				</div>
			</div>


			<div class="col-lg-4 col-12">
				<div class="order-details">
					<!-- Order Widget -->
					<div class="single-widget">
						<h2>CART  TOTALS</h2>
						<div class="content">
							<ul>
								<li>Sub Total<span><?php echo number_format($total) ?></span></li>
								<li>(+) Shipping<span> <?php if(isset($shipping_cost)){ echo number_format($shipping_cost); } ?> </span></li>
								<li class="last">Total<span> <?php if(isset($grand_total)){ echo number_format($grand_total); } ?> </span></li>
							</ul>
						</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Order Widget -->
					<div class="single-widget">
						<h2>Payment Method</h2>
						<div class="content ml-4 mt-3">
								<label><input name="payment" type="radio" value="AIRTEL"> Airtel Money</label> <br>
								<label><input name="payment" type="radio" value="MTN"> MTN MOMO</label> <br>
								<label><input name="payment" type="radio" value="CARD"> Card </label> <br>
								<label><input name="payment" type="radio" value="CASH"> Cash On Delivery</label> <br>
						</div>
					</div>
					<!--/ End Order Widget -->
					<!-- Payment Method Widget -->
					<div class="single-widget payement">
						<div class="row content">
							<div class="col-md-6"> <img src="images\MTN-Airtel-Logo.png" alt="#"> </div>
							<div class="col-md-6"> <img src="images\mastercard-visa.png" alt="#"> </div>
							
						</div>
					</div>


					<!--/ End Payment Method Widget -->
					<!-- Button Widget -->
					<div class="single-widget get-button">
						<div class="content">
						<input type="hidden" name="amount" value="<?php if(isset($grand_total)){echo $grand_total;} ?>">
						<input type="hidden" name="payment_options" value="mobilemoneyuganda" /> 
						<input type="hidden" name="description" value="ORDER DESCRIPTION" /> 
						<input type="hidden" name="logo" value="../../../logo.png" />
						<input type="hidden" name="title" value="IBO" /> 
						<input type="hidden" name="country" value="UG" /> 
						<input type="hidden" name="currency" value="UGX" /> 

						<input type="hidden" name="pay_button_text" value="Complete Payment" /> 

						<input type="hidden" name="successurl" value="../../../success.php"> 
						<input type="hidden" name="failureurl" value="../../../error.php"> 

						<div class="button">
							<input type="submit" name="store_submit" class="btn" style="background-color: black; border-radius: 5px;" value="Proceed To Checkout">
						</div>
					</div>
				</div>
				<!--/ End Button Widget -->
			</div>
		</div>
		</form>

	</div>
</div>
</section>
		<!--/ End Checkout -->
<


<?php include "footer.php" ?>

 <script>
function displayRow(){
	var cb = document.getElementById("cbox");
	var passwordRow = document.getElementById("password-hide");
	if(cb.checked == true){
		passwordRow.style.display = "inline-block";
	}
	else{
		passwordRow.style.display = "none";
	}
}

 </script>

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