<?php
include ("connection.php");


if ( $_POST['action'] == "AddProduct" ) {

	$target_dir 	= "img/";
	$target_file 	= $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$fileUpload 	= move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);

	$prod_name 	= $_POST['prod_name'];
	$prod_category 	= $_POST['prod_category'];
	$prod_country 	= $_POST['prod_country'];
	$prod_price 	= $_POST['prod_price'];
	$prod_company 	= $_POST['prod_company'];
        $prod_status 	= $_POST['prod_status'];
        $prod_dealer 	= $_POST['prod_dealer'];
	$prod_img 	= basename($_FILES["fileToUpload"]["name"]);
	$prod_create_time = time();

	$add_prod_sql	= "INSERT INTO product (product_name, product_category, product_company, product_price, product_country, product_image, product_create_date, product_status, dealer_id ) VALUES ('$prod_name', '$prod_category', '$prod_company', '$prod_price', '$prod_country', '$prod_img', '$prod_create_time', '$prod_status', '$prod_dealer')";
	$add_prod 	= mysqli_query($con, $add_prod_sql);	

	$redirect_url	= "dealer.php?dealer=" . $prod_dealer ;


	header('Location: '.$redirect_url );


}


if ( $_POST['action'] == "DelProduct" ) {

	$prod_id	= $_POST['prodID'];
	$prod_dealer    = $_POST['dealerID'];

	$del_prod_sql 	= "DELETE FROM product WHERE id='$prod_id'";
	$del_prod	= mysqli_query($con, $del_prod_sql);


	$redirect_url   = "dealer.php?dealer=" . $prod_dealer ;
	header('Location: '.$redirect_url );

}


if ( $_POST['action'] == "DelCategory" ) {

        $cat_id        = $_POST['catID'];
        $prod_dealer    = $_POST['dealerID'];

        $del_cat_sql   = "DELETE FROM category WHERE id='$cat_id'";
        $del_cat       = mysqli_query($con, $del_cat_sql);

        $redirect_url   = "dealer.php?dealer=" . $prod_dealer ;
        header('Location: '.$redirect_url );

}


if ( $_POST['action'] == "EditDealer" ) {

        $dealer_id      = $_POST['dealer_id'];
	$dealer_name    = $_POST['dealer_name'];
	$dealer_login	= $_POST['dealer_login'];
	$dealer_pass	= $_POST['dealer_pass'];
	$dealer_add1    = $_POST['dealer_add1'];
	$dealer_add2    = $_POST['dealer_add2'];
	$dealer_country = $_POST['dealer_country'];
	$dealer_offer    = $_POST['dealer_offer'];

        $update_dealer_sql   = "UPDATE dealer SET dealer_login='$dealer_login', dealer_pass='$dealer_pass', dealer_name='$dealer_name', dealer_address1='$dealer_add1', dealer_address2='$dealer_add2', dealer_country='$dealer_country', dealer_offer='$dealer_offer' WHERE dealer_id='$dealer_id' ";
        $update_dealer       = mysqli_query($con, $update_dealer_sql);

        $redirect_url   = "dealer.php?dealer=" . $dealer_id ;
        header('Location: '.$redirect_url );

}

if ( $_POST['action'] == "Login" ) {



        $username       = $_POST['username'];
	$password    	= $_POST['password'];

	$login_check1_sql 	= "SELECT customer_email, customer_pass, id FROM customer WHERE customer_email='$username' AND customer_pass='$password'";
	$login_check1_res	= mysqli_query($con, $login_check1_sql);
	if (mysqli_num_rows($login_check1_res) != 0 ) {  
		
		$customer_row     = mysqli_fetch_array($login_check1_res);
		$redirect_url   = "customer.php?id=" . $customer_row['id'] ;
		header('Location: '.$redirect_url );
	}	

	else { 

	$login_check2_sql = "SELECT dealer_login, dealer_pass, dealer_id FROM dealer WHERE dealer_login='$username' AND dealer_pass='$password' ";
	$login_check2_res       = mysqli_query($con, $login_check2_sql);
	if (mysqli_num_rows($login_check2_res) != 0 ) { 

		$dealer_row	= mysqli_fetch_array($login_check2_res);
		$redirect_url   = "dealer.php?dealer=" . $dealer_row['dealer_id'] ;
		header('Location: '.$redirect_url );
	
	}
	else {
	$redirect_url = "index.php?login=error" ;
	header('Location: '.$redirect_url );
	}
	}
}	









?>
