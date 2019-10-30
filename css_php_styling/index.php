<?php
include ('connection.php');

if (empty($_GET['login'])) { $login = "guest"; } 
#if ( $_GET['login'] == "error") { $login = "error"; }

$dealer_sql = "SELECT * FROM dealer ";
$dealer_res = mysqli_query($con,$dealer_sql);
$dealer_row = mysqli_fetch_array($dealer_res);

$dealer_name 		= $dealer_row['dealer_name'];
$dealer_address1 	= $dealer_row['dealer_address1'];
$dealer_address2 	= $dealer_row['dealer_address2'];
$dealer_country		= $dealer_row['dealer_country'];
$dealer_offer 		= $dealer_row['dealer_offer'];

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Online product deals</title>
 		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">
 		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
 		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>
 		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>
 		<link rel="stylesheet" href="css/font-awesome.min.css">
 		<link type="text/css" rel="stylesheet" href="css/style.css"/>
    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					
					<ul class="header-links pull-right">
                                                <li><a href="#" data-toggle="modal" data-target="#account_modal"><i class="fa fa-user-o"></i>Login</a></li>
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
						<div class="col-md-6">
							<div class="header-logo">
								<a href="#" class="logo">
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
                                                                                <option value="1">Category 01</option>
                                                                                <option value="1">Category 02</option>
                                                                        </select>
                                                                        <input class="input" placeholder="Search here">
                                                                        <button class="search-btn">Search</button>
                                                                </form>
                                                        </div>
                                                </div>
                                                <!-- /SEARCH BAR -->

					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<!-- /NAVIGATION -->

		<!-- BREADCRUMB -->
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- ASIDE -->
					<div id="aside" class="col-md-3">
						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Categories</h3>
							<div class="checkbox-filter">
<?php
$cat_list_sql = "SELECT product_category, count(*) FROM product GROUP BY product_category";
$cat_list_res = mysqli_query($con,$cat_list_sql);
while($cat_list_row = mysqli_fetch_array( $cat_list_res)){
?>


								<div class="input-checkbox">
									<label for="category-1">
										<span></span>
										  <?php echo $cat_list_row['0'] ; ?> 
										<small>(<?php echo $cat_list_row['1'] ; ?>)</small>
									</label>
								</div>
<?php } ?>

							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<div class="aside">
							<h3 class="aside-title">Brands</h3>
							<div class="checkbox-filter">
<?php
$company_list_sql = "SELECT product_company, count(*) FROM product GROUP BY product_company";
$company_list_res = mysqli_query($con,$company_list_sql);
while($company_list_row = mysqli_fetch_array( $company_list_res)){
?>
								<div class="input-checkbox">
									<label for="brand-2">
										<span></span>
										<?php echo $company_list_row['0'] ; ?> 
										<small>(<?php echo $company_list_row['1'] ; ?> )</small>
									</label>
								</div>
<?php } ?>
							</div>
						</div>
						<!-- /aside Widget -->

						<!-- aside Widget -->
						<!-- /aside Widget -->
					</div>
					<!-- /ASIDE -->


					<div class="col-md-9">
<?php
if ( $login == "guest" ) {
?>
					<!-- STORE -->
                                        <!-- STORE -->
                                        <div id="store" class="col-md-12">
                                                <!-- store top filter -->
                                                <!-- /store top filter -->

                                                <!-- store products -->
                                                <div class="row">
                                                <div class="section-title">
                                                        <h4 class="title"> Products</h4>
                                                        <div class="section-nav">
                                                                <div id="slick-nav-5" class="products-slick-nav"></div>
                                                        </div>
                                                </div>

<?php
$prod_sql = "SELECT * FROM product ";
$prod_res = mysqli_query($con,$prod_sql);
while($prod_row=mysqli_fetch_array($prod_res)){
?>

                                                        <!-- product -->
                                                      <div style="margin:0px;" class="product-widget col-md-6">
                                                                        <div class="product-img">
                                                                        <img src="./img/<?php echo $prod_row['product_image']?>" alt="">
                                                                        </div>
                                                                        <div class="product-body">
                                                                                <p class="product-category"><?php echo $prod_row['product_category']?></p>
										<h3 class="product-name"><a href="product.php?id=<?php echo $prod_row['id']?>"><?php echo $prod_row['product_name']?></a></h3>
                                                                        </div>
                                                      </div>

                                                        <!-- /product -->

<?php } ?>
						</div>
                                                <!-- /store products -->
					<div style="padding:15px" class="row"></div>
                                        </div>
                                        <!-- /STORE -->
<?php } 
if ( $login == "error" ) { 
?>
                                        <div id="store" class="col-md-12">
                                                <!-- store top filter -->
                                                <!-- /store top filter -->

                                                <!-- store products -->
                                                <div class="row">
                                                <div class="section-title">
							<h1 class="title">Login Error</h1>
                                                        <h5> Invalid Username or Password !!! Please check and retry.</h5>
                                                        </div>
                                                </div>
					</div>
<?php } ?>




					<!-- STORE -->
                                        <!-- /STORE -->

				</div>

				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
	</div>
</div>
		<!-- NEWSLETTER -->
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
<?php include ('footer.php'); ?>
		<!-- /FOOTER -->

<!-- Login Modal -->
<?php
$dealer_sql 	= "SELECT * FROM dealer";
$dealer_res	= mysqli_query($con,$dealer_sql);
$dealer_row 	= mysqli_fetch_array($dealer_res);
?>


<div id="account_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">

    <!-- Modal content-->
    <div class="modal-content">
      <div style="background:crimson" class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title">LOGIN</h4>
      </div>
      <div class="modal-body">

        <form action="functions.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" class="form-control" id="action" name="action" value="Login" >

            <fieldset class="form-group col-md-12">
                <label for="last_name">Username</label>
                <input type="text" class="form-control" id="username" name="username">
	    </fieldset>
            <fieldset class="form-group col-md-12">
                <label for="last_name">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </fieldset>
	
	    <button type="submit" class="btn btn-primary">Login</button>

        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




		<!-- jQuery Plugins -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/slick.min.js"></script>
		<script src="js/nouislider.min.js"></script>
		<script src="js/jquery.zoom.min.js"></script>
		<script src="js/main.js"></script>

	</body>
</html>
