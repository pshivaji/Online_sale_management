	<?php session_start(); 


	include('header.php'); 

	if(isset($_POST['checkout'])){



		$name=$_POST['name'];
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		$address=$_POST['address'];



		//Shipment
		$q="insert into shipments (address) value('$address')";
		mysqli_query($con,$q);

		$shipment_id=mysqli_insert_id($con);

		//Customer Details
		$q="insert into customer (name,email,password) value('$name','$email','$pass')";
		mysqli_query($con,$q);

		$c_id=mysqli_insert_id($con);

		//Order
		$q="insert into orders (c_id) value($c_id)";
		mysqli_query($con,$q);


		$order_id=mysqli_insert_id($con);


		if(isset($_SESSION['cart'])){
		//Sale
		foreach($_SESSION['cart'] as $key=>$cart ){						

			$d_id=$cart['dealer'];
			$price=$cart['price'];
			$q="insert into sales (order_id,p_id,dealer_id,shipment_id,sales_price) value($order_id,$key,$d_id,$shipment_id,$price)";
			mysqli_query($con,$q);
		}
	}

		unset($_SESSION['cart']);
		$_SESSION['error']="Checked Out, You may login now to see the detail";

		
	}

	?>

	<!-- //page -->
	<!-- checkout page -->
	<div class="privacy py-sm-5 py-4">
		<div class="container py-xl-4 py-lg-2">

			<?php if(isset($_SESSION['error'])){ ?>
			<div class="alert alert-success">
				Checked out succesfully. You may now login to see details.
			</div>
			<?php unset($_SESSION['error']); } ?>
			<!-- tittle heading -->
			<h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">
				<span>C</span>heckout
			</h3>
			<!-- //tittle heading -->
			<div class="checkout-right">
				
				<div class="table-responsive">
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Price</th>
							</tr>
						</thead>
						<tbody>

							<?php 

								if(isset($_SESSION['cart'])){

								foreach($_SESSION['cart'] as $key=>$cart ){
									
									$name=$cart['name'] ;
									$price=$cart['price']
								?>


								<tr class="rem1">
									
									
									<?php if(isset($name) and isset($price)){?>
									<td class="invert"><?php echo $name; ?></td>
									<td class="invert"><?php echo "$".$price; ?></td>
									<?php } ?>
									
								</tr>
							<?php } }else{ ?>
								<td class="invert" colspan="2">No product has been added yet.</td>
							<?php } ?>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="checkout-left">
				<div class="address_form_agile mt-sm-5 mt-4">
					<h4 class="mb-sm-4 mb-3">Shipping Address and Customer Details</h4>
					<form action="" method="post" class="">
						<div class="creditly-wrapper wthree, w3_agileits_wrapper">
							<div class="information-wrapper">

								<div class="first-row">

									<div class="controls form-group">
										<input class="form-control" type="text" name="name" placeholder="Full Name" required="">

									</div>
									<div class="w3_agileits_card_number_grids">
										<div class="w3_agileits_card_number_grid_left form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Email" name="email" required="">
											</div>
										</div>

										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="password" class="form-control" placeholder="Password" name="pass" required="">
											</div>
										</div>


										<div class="w3_agileits_card_number_grid_right form-group">
											<div class="controls">
												<input type="text" class="form-control" placeholder="Shipping Address" name="address" required="">
											</div>
										</div>
									</div>
									

								</div>
								<button type="submit" class="btn btn-primary" name="checkout">Delivery to this Address</button>
							</div>
						</div>
					</form>
					
				</div>
			</div>
		</div>
	</div>
	<!-- //checkout page -->

	
	<!-- middle section -->

	
	<!-- //copyright -->

	<!-- js-files -->
	<!-- jquery -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- //jquery -->

	<!-- nav smooth scroll -->
	<script>
		$(document).ready(function () {
			$(".dropdown").hover(
				function () {
					$('.dropdown-menu', this).stop(true, true).slideDown("fast");
					$(this).toggleClass('open');
				},
				function () {
					$('.dropdown-menu', this).stop(true, true).slideUp("fast");
					$(this).toggleClass('open');
				}
			);
		});
	</script>
	<!-- //nav smooth scroll -->

	<!-- popup modal (for location)-->
	<script src="js/jquery.magnific-popup.js"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- //popup modal (for location)-->

	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	
	<!-- //cart-js -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- quantity -->
	<script>
		$('.value-plus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) + 1;
			divUpd.text(newVal);
		});

		$('.value-minus').on('click', function () {
			var divUpd = $(this).parent().find('.value'),
				newVal = parseInt(divUpd.text(), 10) - 1;
			if (newVal >= 1) divUpd.text(newVal);
		});
	</script>
	<!--quantity-->
	<script>
		$(document).ready(function (c) {
			$('.close1').on('click', function (c) {
				$('.rem1').fadeOut('slow', function (c) {
					$('.rem1').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close2').on('click', function (c) {
				$('.rem2').fadeOut('slow', function (c) {
					$('.rem2').remove();
				});
			});
		});
	</script>
	<script>
		$(document).ready(function (c) {
			$('.close3').on('click', function (c) {
				$('.rem3').fadeOut('slow', function (c) {
					$('.rem3').remove();
				});
			});
		});
	</script>
	<!-- //quantity -->

	<!-- smoothscroll -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="js/bootstrap.js"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->

</body>

</html>