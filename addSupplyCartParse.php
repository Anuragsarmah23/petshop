<?php
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_POST["id"];
	$customerID=$_SESSION["customerID"];
	$price=$_POST["price"];
	$cartQty=$_POST["cartQty"];
	$totalPrice=$price*$cartQty;
	$q="insert into cart(customerID,supplyID,cartQty,BaseAmount,TotalAmount) values('$customerID','$id','$cartQty','$price','$totalPrice')";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("Product added to cart")</script>';
		echo '<script>setTimeout(function (){location.href="cart.php";});</script>';
	}	
	else
		echo '<script>alert("Something went wrong..please try again..")</script>';