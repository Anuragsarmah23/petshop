<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_GET["id"];
	$q2="delete from transaction where customerID='$id'";
	$q2_run=mysqli_query($con,$q2);
	$q1="delete from cart where customerID='$id'";
	$q1_run=mysqli_query($con,$q1);
	$q="delete from customer where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run)
		header("location:customers.php");
	else	
		echo '<script>alert("Something went wrong.. Please try again..")</script>';	
		echo '<script>location.href="customers.php"</script>';
	mysqli_close($con);
?>