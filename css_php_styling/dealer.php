<?php
include ('connection.php');

if (empty($_GET)) { $dealer_id = 1; } else { $dealer_id = $_GET['dealer']; }

$dealer_sql = "SELECT * FROM dealer WHERE dealer_id=$dealer_id";
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
		<title>Electro - HTML Ecommerce Template</title>
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
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
					</ul>
					<ul class="header-links pull-right">
                                                <li style="font-size:15px; color:crimson;">Welcome, <?php echo $dealer_name;?></li>
                                                <li><a href="#" data-toggle="modal" data-target="#account_modal"><i class="fa fa-user-o"></i> My Account</a></li>
                                                <li><a href="#"><?php echo $dealer_country ?></a></li>
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

						<!-- ACCOUNT -->
						<div class="col-md-6 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<div>
									<a href="#" data-toggle="modal" data-target="#add_prod_modal" >
										<i class="fa fa-plus-circle"></i>
										<span>Add Product</span>
									</a>
								</div>
							i	<!-- /Wishlist -->

                                                                <div>
                                                                        <a href="#">
                                                                                <i class="fa fa-plus-circle"></i>
                                                                                <span>Add Category</span>
                                                                        </a>
                                                                </div>
                                                        i       <!-- /Wishlist -->


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

					<!-- STORE -->
					<div id="store" class="col-md-12">
						<!-- store top filter -->
						<!-- /store top filter -->

						<!-- store products -->
						<div class="row">
                                                <div class="section-title">
                                                        <h4 class="title">My Products</h4>
                                                        <div class="section-nav">
                                                                <div id="slick-nav-5" class="products-slick-nav"></div>
                                                        </div>
                                                </div>

<?php
$prod_sql = "SELECT * FROM product WHERE dealer_id='$dealer_id'";
$prod_res = mysqli_query($con,$prod_sql);
while($prod_row=mysqli_fetch_array($prod_res)){
?>

							<!-- product -->
                                                      <div style="margin:0px; padding:15px;" class="product-widget col-md-6">
                                                                        <div class="product-img">
									<img src="./img/<?php echo $prod_row['product_image']?>" alt="">
                                                                        </div>
                                                                        <div class="product-body">
                                                                                <p class="product-category"><?php echo $prod_row['product_category']?></p>
										<h3 class="product-name"><a href="product.php?id=<?php echo $prod_row['id']?>"><?php echo $prod_row['product_name']?></a></h3>
								     <form action="functions.php" method="POST" >
										    <input type="hidden" id="action" name="action" value="DelProduct">
										    <input type="hidden" id="prodID" name="prodID" value="<?php echo $prod_row['id']?>">
										    <input type="hidden" id="dealerID" name="dealerID" value="<?php echo $dealer_id?>">
                                                                                    <button class="btn btn-danger btn-xs">Delete</button>
                                                                                </form>
									</div>
                                                      </div>

							<!-- /product -->

<?php } ?>

						<!-- /store products -->

					</div>
					<div style="padding:15px" class="row"></div>
					<!-- /STORE -->
					</div>

                                        <!-- STORE -->
                                        <div id="store" class="col-md-12">
                                                <!-- store top filter -->
                                                <!-- /store top filter -->

                                                <!-- store products -->
                                                <div class="row">
                                                <div class="section-title">
                                                        <h4 class="title">Total Products</h4>
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

					<!-- STORE -->
                                        <div id="store" class="col-md-12">
                                                <!-- store top filter -->
                                                <!-- /store top filter -->

                                                <!-- store products -->
                                                <div class="row">
                                                <div class="section-title">
                                                        <h4 class="title">Categories</h4>
                                                        <div class="section-nav">
                                                                <div id="slick-nav-5" class="products-slick-nav"></div>
                                                        </div>
                                                </div>

<?php
$cat_sql = "SELECT * FROM category";
$cat_res = mysqli_query($con,$cat_sql);
while($cat_row=mysqli_fetch_array($cat_res)){
?>

                                                        <!-- product -->
                                                      <div style="margin:0px;" class="product-widget col-md-6">
                                                                        <div style="padding:0" class="product-body">
										<h3 class="product-name"><a href="product.php?cat=<?php echo $cat_row['category_name']?>"><?php echo $cat_row['category_name']?></a></h3>
										<form action="functions.php" method="POST">
										    <input type="hidden" id="action" name="action" value="DelCategory">
										    <input type="hidden" id="dealerID" name="dealerID" value="<?php echo $dealer_id?>">	
										    <input type="hidden" id="catID" name="catID" value="<?php echo $cat_row['id']?>">
										    <button class="btn btn-danger btn-xs">Delete</button>
										</form>
                                                                        </div>
                                                      </div>

                                                        <!-- /product -->

<?php } ?>
						
                                                <!-- /store products -->

                                        </div>
                                        <!-- /STORE -->




                                        <!-- STORE -->
                                        <div id="store" class="col-md-12">
                                                <!-- store top filter -->
                                                <!-- /store top filter -->

                                                <!-- store products -->
                                                <div class="row">
                                                <div class="section-title">
                                                        <h4 class="title">Deleted Products</h4>
                                                        <div class="section-nav">
                                                                <div id="slick-nav-5" class="products-slick-nav"></div>
                                                        </div>
                                                </div>

							<!-- product -->
  							<table class="table">
    								<thead class="thead-dark">
      									<tr>
        									<th>Sl. No.</th>
        									<th>Product</th>
										<th>Created On</th>
										<th>Deleted On</th>
      									</tr>
    								</thead>
    								<tbody>
<?php
$num = 1;
$trig_sql = "SELECT * FROM trig INNER join trig2 ON trig.product_name=trig2.product_name";
$trig_res = mysqli_query($con,$trig_sql);
while($trig_row=mysqli_fetch_array($trig_res)){
?>
									<tr>
										<td><?php echo $num ?> </td>
										<td><?php echo $trig_row['product_name']?></td>
                                                                                <td><?php echo $trig_row['cdate']?></td>
										<td><?php echo $trig_row['deleted_cdate']?></td>
									</tr>
<?php $num = $num + 1;  } ?>
								</tbody>
							</table>
									

                                                        <!-- /product -->


                                                <!-- /store products -->

                                        </div>
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
<!-- Modal -->
<div id="add_prod_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">

	<form action="functions.php" method="POST" enctype="multipart/form-data">

	    <input type="hidden" class="form-control" id="action" name="action" value="AddProduct" >
	    <input type="hidden" class="form-control" id="prod_dealer" name="prod_dealer" value="<?php echo $dealer_id ?>" >

	    <fieldset class="form-group col-md-6">
		<label for="first_name">Name</label>
		<input type="text" class="form-control" id="prod_name" name="prod_name">
	    </fieldset>
	    <fieldset class="form-group col-md-6">
		<label for="last_name">Company</label>
    	        <input type="text" class="form-control" id="prod_company" name="prod_company">
	    </fieldset>
            <fieldset class="form-group col-md-6">
                <label for="first_name">Price</label>
                <input type="text" class="form-control" id="prod_price" name="prod_price">
	    </fieldset>
	    <fieldset class="form-group col-md-6">
		<label for="first_name">Category</label>
		<select name="prod_category" class="input-select col-md-12">
<?php
$cat_list_sql = "SELECT * FROM category";
$cat_list_res=mysqli_query($con,$cat_list_sql);
while($cat_list_row=mysqli_fetch_array($cat_list_res)){
?>
		    <option value="<?php echo $cat_list_row['category_name'] ?>"><?php echo $cat_list_row['category_name'] ?></option>
<?php } ?>
                </select>
	    </fieldset>
            <fieldset class="form-group col-md-6">
                <label for="first_name">Country</label>
                <select name="prod_country" class="input-select col-md-12">
<?php
$country_list_sql = "SELECT * FROM country";
$country_list_res=mysqli_query($con,$country_list_sql);
while($country_list_row=mysqli_fetch_array($country_list_res)){
?>
                    <option value="<?php echo $country_list_row['country_name'] ?>"><?php echo $country_list_row['country_name'] ?></option>
<?php } ?>
                </select>
            </fieldset>

            <fieldset class="form-group col-md-6">
                <label for="first_name">Status</label>
                <select name="prod_status" class="input-select col-md-12">
		    <option value="in stock">In Stock</option>
		    <option value="out of stock">Out Of Stock</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-md-12">
		<label for="first_name">Image of Product</label>
		    <input type="file" name="fileToUpload" id="fileToUpload">
            </fieldset>

	    	<button type="submit" class="btn btn-primary ">Add Product</button>
	    
	</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<!-- My Account Modal -->
<?php
$dealer_sql 	= "SELECT * FROM dealer WHERE dealer_id='$dealer_id'";
$dealer_res	= mysqli_query($con,$dealer_sql);
$dealer_row 	= mysqli_fetch_array($dealer_res);
?>


<div id="account_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
	<h4 class="modal-title"><?php echo $dealer_row['dealer_name']?></h4>
      </div>
      <div class="modal-body">

        <form action="functions.php" method="POST" enctype="multipart/form-data">

            <input type="hidden" class="form-control" id="action" name="action" value="EditDealer" >
            <input type="hidden" class="form-control" id="dealer_id" name="dealer_id" value="<?php echo $dealer_id ?>" >

            <fieldset class="form-group col-md-6">
                <label for="first_name">Dealer Name</label>
		<input type="text" class="form-control" id="dealer_name" name="dealer_name" value="<?php echo $dealer_row['dealer_name'] ?>">
            </fieldset>
            <fieldset class="form-group col-md-6">
                <label for="last_name">Dealer Login</label>
                <input type="text" class="form-control" id="dealer_login" name="dealer_login" value="<?php echo $dealer_row['dealer_login'] ?>">
	    </fieldset>
            <fieldset class="form-group col-md-6">
                <label for="last_name">Dealer Password</label>
                <input type="password" class="form-control" id="dealer_pass" name="dealer_pass" value="<?php echo $dealer_row['dealer_pass'] ?>">
            </fieldset>
            <fieldset class="form-group col-md-6">
                <label for="last_name">Dealer Address 1</label>
                <input type="text" class="form-control" id="dealer_add1" name="dealer_add1" value="<?php echo $dealer_row['dealer_address1'] ?>">
	    </fieldset>
            <fieldset class="form-group col-md-6">
                <label for="last_name">Dealer Address 2</label>
                <input type="text" class="form-control" id="dealer_add2" name="dealer_add2" value="<?php echo $dealer_row['dealer_address2'] ?>">
            </fieldset>

            <fieldset class="form-group col-md-6">
                <label for="first_name">Country</label>
		<select name="dealer_country" class="input-select col-md-12">
		<option value="<?php echo $dealer_row['dealer_country'] ?>"><?php echo $dealer_row['dealer_country'] ?></option>
<?php
$country_list_sql = "SELECT * FROM country";
$country_list_res=mysqli_query($con,$country_list_sql);
while($country_list_row=mysqli_fetch_array($country_list_res)){
		if ( $dealer_row['dealer_country'] != $country_list_row['country_name'] ) {
?>
                    <option value="<?php echo $country_list_row['country_name'] ?>"><?php echo $country_list_row['country_name'] ?></option>

<?php } } ?>
                </select>
            </fieldset>


            <fieldset class="form-group col-md-12">
                <label for="last_name">Offer Percent</label>
                <input type="text" class="form-control" id="dealer_offer" name="dealer_offer" value="<?php echo $dealer_row['dealer_offer'] ?>">
            </fieldset>
	
	    <button type="submit" class="btn btn-primary ">Update Dealer</button>

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
