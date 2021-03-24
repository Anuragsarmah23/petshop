<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_SESSION["supplyID"];
	$price=mysqli_real_escape_string($con,$_POST['price']);
	$qty=mysqli_real_escape_string($con,$_POST['qty']);
	$dPrice=$price/4;
	$discount=mysqli_real_escape_string($con,$_POST['discount']);
	if($discount>$dPrice){
		echo '<script>alert("Discount should not exceed 25%")</script>';
		echo '<script>window.history.back();</script>';
		die();
	}
	$q="update supplies set price='$price', qty='$qty', discount='$discount' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("success")</script>';
		echo '<script>location.href="products.php";</script>';
	}
	else	
		echo'<script>alert("error")</script>';	
	mysqli_close($con);
?>