<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_GET["id"];
	$q1="delete from cart where id='$id'";
	$q1_run=mysqli_query($con,$q1);
	if($q1_run)
		header("location:cart.php");
	else	
		echo '<script>alert("Something went wrong.. Please try again..")</script>';
		echo '<script>location.href="cart.php"</script>';	
	mysqli_close($con);
?>