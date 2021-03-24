<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_SESSION["customerID"];
	$fn=mysqli_real_escape_string($con,$_POST['fname']);
	$mn=mysqli_real_escape_string($con,$_POST['mname']);
	$ln=mysqli_real_escape_string($con,$_POST['lname']);
	$email=mysqli_real_escape_string($con,$_POST['email']);
	$cno=mysqli_real_escape_string($con,$_POST['cno']);
	$address=mysqli_real_escape_string($con,$_POST['address']);
	$city=mysqli_real_escape_string($con,$_POST['city']);
	$pin=mysqli_real_escape_string($con,$_POST['pin']);
	$pass=mysqli_real_escape_string($con,$_POST['password']);
	$q="update customer set fname='$fn', mname='$mn', lname='$ln', email='$email', contact='$cno', address='$address', city='$city', pin='$pin', password='$pass' where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		echo '<script>alert("success")</script>';
		echo '<script>location.href="main.php";</script>';
	}
	else	
		echo'<script>alert("error")</script>';	
	mysqli_close($con);
?>