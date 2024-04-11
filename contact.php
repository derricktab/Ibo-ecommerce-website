<?php include "header.php" ?>

<title>Contact | IBO </title>

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
							<li><a href="/ibo/store/">Home<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="contact.php">Contact</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->
  
<div class="container"></div>
  <div class="row mr-auto">
	<div class="jumbotron text-center w-100 p-4 mt-3 mb-0 mx-auto" style="font-size: 17px">We'd Love To Hear From You <i class="fa fa-headset text-secondary" style="font-size: 30px"></i> </div>
  </div>
</div>
	<!-- Start Contact -->
	<section id="contact-us" class="contact-us section">
		<div class="container">
				<div class="contact-head">
					<div class="row">
						<div class="col-lg-8 col-12">
							<div class="form-main">
								<div class="title">
									<h4>Get in touch</h4>
									<h3>Write us a message</h3>
								</div>
								<form class="form" method="post" action="">
									<div class="row">
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Name<span>*</span></label>
												<input name="name" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Subjects<span>*</span></label>
												<input name="subject" type="text" placeholder="">
											</div>
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Email<span>*</span></label>
												<input name="email" type="email" placeholder="">
											</div>	
										</div>
										<div class="col-lg-6 col-12">
											<div class="form-group">
												<label>Your Phone<span>*</span></label>
												<input name="phone_number" type="text" placeholder="">
											</div>	
										</div>
										<div class="col-12">
											<div class="form-group message">
												<label>your message<span>*</span></label>
												<textarea name="message" placeholder=""></textarea>
											</div>
										</div>
										<div class="col-12">
											<div class="form-group button">
												<button type="submit" name="submit" class="btn ">Send Message</button>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="col-lg-4 col-12">
							<div class="single-head">
								<div class="single-info">
									<i class="fa fa-phone"></i>
									<h4 class="title">Call us Now:</h4>
									<ul>
										<li>0784565432</li>
										<li>0706144689 </li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-envelope-open"></i>
									<h4 class="title">Email:</h4>
									<ul>
										<li><a href="mailto:info@iboassociational.com">info@iboassociational.com</a></li>
										<li><a href="mailto:support@iboassociational.com">support@iboassociational.com</a></li>
									</ul>
								</div>
								<div class="single-info">
									<i class="fa fa-location-arrow"></i>
									<h4 class="title">Our Address:</h4>
									<ul>
										<li>Nansana, Wakiso District.</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</section>
	<!--/ End Contact -->
	
<?php 


if(isset($_POST['submit'])){
	$sender_name = mysqli_real_escape_string($con, $_POST['name']);
	$subject = mysqli_real_escape_string($con, $_POST['subject']);
	$email = mysqli_real_escape_string($con, $_POST['email']);
	$phone_number = mysqli_real_escape_string($con, $_POST['phone_number']);
	$message = mysqli_real_escape_string($con, $_POST['message']);


// INSERTING THE SENT MESSAGE INTO THE DATABASE
$result = mysqli_query($con, "INSERT INTO contact (sender_name, subject, email_address, phone_number, message, date_sent) VALUES ('$sender_name', '$subject', '$email', '$phone_number', '$message', NOW() )");

if($result){
	echo "<script>alert('THE MESSAGE HAS BEEN SENT AND INSERTED INTO THE DATABASE SUCCUSSFULLY!')</script>";
}
else{
	echo "<script>'DATA INSERTION FAILED'</script>";
}






}//Closing the if statement of submit
?>





	<!-- Map Section -->
	<div class="container">
	<div class="map-section">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.758773216352!2d32.52689631417291!3d0.3130343641176007!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177da393a24c4cd3%3A0xf50ba53c71e6d0d4!2sNansana%20Ganda!5e0!3m2!1sen!2sug!4v1620660479402!5m2!1sen!2sug" width="600" id="myMap" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
	</div>
	
	<!--/ End Map Section -->
	


	<!-- Start Shop Newsletter  -->
	<section class="shop-newsletter section">
		<div class="container">
			<div class="inner-top">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 col-12">
						<!-- Start Newsletter Inner -->
						<div class="inner">
							<h4>Newsletter</h4>
							<p> Subscribe to our newsletter and get <span>3%</span> off your first purchase</p>
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" required="" type="email">
								<button class="btn">Subscribe</button>
							</form>
						</div>
						<!-- End Newsletter Inner -->
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Newsletter -->
	<?php include "footer.php" ?>

<script>
	window.onload = function() {
    $("#contact").addClass("active");
};
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