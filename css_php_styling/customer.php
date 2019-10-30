<?php
include ('connection.php');

$sql = "SELECT * from customer where id=1";
$res = mysqli_query($con,$sql);
$row = mysqli_fetch_array($res);

$customer_email = $row['customer_email'];
$customer_fname = $row['customer_first_name'];
$customer_lname = $row['customer_last_name'];
$country_code = $row['country_code'];

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>Online Shopping</title>
		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-right">
						<li style="font-size:15px; color:crimson;">Welcome, <?php echo $customer_fname . " " . $customer_lname;?></li>
                                                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>
						<li><a href="#"><!--<i class="fa fa-dollar"></i>--><?php echo $country_code ?></a></li> 
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="#" style="color:white; font-size:large;" >
									<img src="./img/logo.png" alt="">
								
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<div class="header-search">
								<form>
									<select class="input-select">
										<option value="0">All Categories</option>
<?php
$cat_sql = "SELECT * FROM category" ;
$cat_res = mysqli_query($con,$cat_sql);
while( $cat_row = mysqli_fetch_array($cat_res)) {
?>
									<option value="<?php echo $cat_row['category_name'] ?>"><span style="text-transform:capitalize" ><?php echo $cat_row['category_name']?></span></option>
<?php } ?>
									</select>
									<input class="input" placeholder="Search here">
									<button class="search-btn">Search</button>
								</form>
							</div>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div>
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
										<i class="fa fa-shopping-cart"></i>
										<span>Your Cart</span>
										<div class="qty">3</div>
									</a>
								</div>
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="#">Home</a></li>
						<li><a href="#">Hot Deals</a></li>
						<li><a href="#">Categories</a></li>
						<li><a href="#">Laptops</a></li>
						<li><a href="#">Smartphones</a></li>
						<li><a href="#">Cameras</a></li>
						<li><a href="#">Accessories</a></li>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- SECTION -->
                <div class="section">
                        <!-- container -->
                        <div class="container">
                                <!-- row -->
                                <div class="row">

                                        <!-- section title -->
                                        <div class="col-md-12">
                                                <div class="section-title">
                                                        <h3 class="title">Top selling</h3>
                                                </div>
                                        </div>
                                        <!-- /section title -->

                                        <!-- Products tab & slick -->
                                        <div class="col-md-12">
                                                <div class="row">
                                                        <div class="products-tabs">
                                                                <!-- tab -->
                                                                <div id="tab2" class="tab-pane fade in active">
                                                                        <div class="products-slick" data-nav="#slick-nav-2">
                                                                                <!-- product -->
<?php
$sql="SELECT * FROM product Order by product_sell_count DESC LIMIT 4";
$res=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
?>
                                                                                <div class="product">
                                                                                        <div class="product-img">
                                                                                        <img src="./img/<?php echo $row['product_image']?>" alt="">
                                                                                        </div>
                                                                                        <div class="product-body">
                                                                                        <p class="product-category"><?php echo $row['product_category'] ?></p>
												<h3 class="product-name"><a href="/product.php?id=<?php echo $row['id']?>"><?php echo $row['product_name'] ?></a></h3>
                                                                                                <h4 class="product-price"><?php echo $row['product_price'] ?> <del class="product-old-price"><?php echo $row['product_price'] ?></del></h4>
                                                                                                <div class="product-rating">
<?php
$star = 1;
while($row['product_rating'] >= $star ) {
?>
                                                                                                        <i class="fa fa-star"></i>
<?php
$star = $star + 1 ;
} ?>
                                                                                                                </div>
                                                                                        </div>
                                                                                </div>
<?php } ?>
                                                                                <!-- /product -->

                                                                                <!-- product -->
                                                                                <!-- /product -->
                                                                        </div>
                                                                </div>
                                                                <!-- /tab -->
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- /Products tab & slick -->
                                </div>
                                <!-- /row -->
                        </div>
                        <!-- /container -->
                </div>



		<!-- /SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">New Products</h3>
							<div class="section-nav">
								<ul class="section-tab-nav tab-nav">
<?php 
$sql = "SELECT * FROM category";
$res = mysqli_query($con,$sql);
while($row=mysqli_fetch_array($res)){
?>
									<li style="text-transform:capitalize;" <?php if ( $row['id']==1 ) { echo 'class="active"'; } ?> ><a data-toggle="tab" href="#tab1"><?php echo $row['category_name']?></a></li> 
<?php } ?>
								</ul>
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
<?php
$sql="select * from product";
$res=mysqli_query($con,$sql);
?>

					<div class="col-md-12">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab1" class="tab-pane active">
									<div class="products-slick" data-nav="#slick-nav-1">
										<!-- product -->
<?php
while($row=mysqli_fetch_array($res)){
?>
										<div class="product">
											<div class="product-img">
											<img src="./img/<?php echo $row['product_image']?>" alt="">
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $row['product_category']?></p>
												<h3 class="product-name"><a href="#"><?php echo $row['product_name']?></a></h3>
												<h4 class="product-price"><?php echo $row['product_price']?> <del class="product-old-price"><?php echo $row['product_price']?></del></h4>
												<div class="product-rating">

<?php
$star = 1;
while($row['product_rating'] >= $star ) {
?>
                                                                                                        <i class="fa fa-star"></i>
<?php
$star = $star + 1 ;
} ?>
												</div>
											</div>
										</div>
<?php
}
?>
										<!-- /product -->

									</div>
									<div id="slick-nav-1" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- HOT DEAL SECTION -->
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<!-- /SECTION -->

		<!-- SECTION -->
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
<?php include ('footer.php'); ?>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
