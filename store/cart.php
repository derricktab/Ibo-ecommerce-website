<?php include "header.php" ?>
<?php include "dbcon.php" ?>

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
							<li class="active"><a href="#">Cart</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	
	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container w-100">
			<div class="row ">
				<div class="col-md-12">
					<!-- Shopping Summery -->
					<div class="table-responsive">
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUCT</th>
								<th>NAME</th>
								<th class="text-center">UNIT PRICE</th>
								<th class="text-center">QUANTITY</th>
								<th class="text-center">TOTAL</th> 
								<th class="text-center"> <a href="empty-cart.php"> <i class="ti-trash remove-icon"></i> </a></th>
							</tr>
						</thead>
						<tbody>

							<?php 
							// checking if the cart is containing any elements.
								$cart = isset($_COOKIE["cart"]) ? $_COOKIE["cart"] : "[]";
								// decode the data returned by the cart.
								$cart = json_decode($cart, true);
								
								$cart_items_counter = count($cart);

								$total = 0;
								
								if($cart_items_counter == 0){ ?>
								<tr >
									<td colspan="6" class="text-center">The Cart is Empty</td>
								</tr>

							<?php } ?>

							<?php


								
								for($i=0; $i<$cart_items_counter; $i++){
								$total += $cart[$i]['total_price'];
							?>

							<tr>

								
								<td class="image" data-title="No"><img src="mlm/uploads/<?php echo $cart[$i]['product_image'] ?>" alt="#"></td>

								<td class="product-des" data-title="Description">
									<p class="product-name"><a href="#"> <?php echo $cart[$i]['product_name'] ?> </a></p>

								</td>
								<td class="price" data-title="Price"><span> USh <?php echo number_format($cart[$i]['product_price']) ?> </span></td>

								<td class="qty" data-title="Qty"><!-- Input Order -->
									<div class="input-group">
										<div class="button minus">
											<button type="button" class="btn btn-primary btn-number" disabled="disabled" data-type="minus" data-field="quant[1]">
												<i class="ti-minus"></i>
											</button>
										</div>
										<input type="text" name="quant[1]" class="input-number"  data-min="1" data-max="100" value="<?php echo $cart[$i]['quantity']  ?>">
										<div class="button plus">
											<button type="button" class="btn btn-primary btn-number" data-type="plus" data-field="quant[1]">
												<i class="ti-plus"></i>
											</button>
										</div>
									</div>
									<!--/ End Input Order -->
								</td>

								<td class="total-amount" data-title="Total"><span> USh <?php echo number_format($cart[$i]['total_price']) ?> </span></td>
								<td class="action" data-title="Remove">

									<a href="delete-cart.php?p=<?php echo $cart[$i]['product_id'] ?>" name="prod_id"><i class="ti-trash remove-icon"></i></a></td>
								</tr>
								<?php } ?>

						</tbody>
					</table>
					</div>
					<!--/ End Shopping Summery -->
				</div>
			</div>
			<div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
										<form action="#" target="_blank">
											<input name="Coupon" placeholder="Enter Your Coupon">
											<button class="btn">Apply</button>
										</form>
									</div>
									<div class="checkbox">
										<label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox"> Shipping (UGX 10,000)</label>
									</div>
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li>Cart Subtotal<span> Ush <?php echo number_format($total) ?></span></li>
										<?php 
										$shipping_fee = 10000; 
										$grand_total = $shipping_fee + $total;
										?>
										<li>Shipping<span> <?php echo number_format($shipping_fee) ?> </span></li>
										<li class="last">You Pay<span> Ush <?php echo number_format($grand_total) ?> </span></li>
									</ul>
									<div class="button5">

										<form action="checkout.php" method="post">
										<input type="hidden" name="total" value="<?php echo $total ?>">
										<input type="hidden" name="shipping_fees" value="<?php echo $shipping_fee ?>">
										<input type="hidden" name="grand_total" value="<?php echo $grand_total ?>">
										<input class="btn" style="border-radius: 10px; background-color: black;" value="Checkout" name="checkout" type="submit">
										</form>

										<a href="catalog.php" class="btn" style="border-radius: 10px;">Continue shopping</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->
			
	<!-- Start Shop Services Area  -->
	<section class="shop-services section mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-rocket"></i>
						<h4>Free shiping</h4>
						<p>Orders over $100</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-3 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
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
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->




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