<?php
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_POST["cartID"];
	$customerID=$_SESSION["customerID"];
	$cartQtyPrev=$_POST["cartQtyPrev"];
	$price=$_POST["price"];
	$tprice=$_POST["totalPrice"];
	$cartQty=$_POST["cartQty"];
	$t2price=$price*$cartQty;
	$totalPrice=$tprice+$t2price;
	$newCartQty=$cartQtyPrev+$cartQty;
	$q="update cart set cartQty='$newCartQty',totalAmount='$totalPrice' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Product added to cart")</script>';
		echo '<script>setTimeout(function (){location.href="cart.php";});</script>';
	}	
	else
		echo '<script>alert("Something went wrong..please try again..")</script>';