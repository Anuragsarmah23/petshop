<?php
	//RADHEY
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_GET["id"];
	$q2="delete from transaction where supplyID='$id'";
	$q2_run=mysqli_query($con,$q2);
	$q1="delete from cart where supplyID='$id'";
	$q1_run=mysqli_query($con,$q1);
	$q="delete from supplies where id='$id'";
	$q_run=mysqli_query($con,$q);
	if($q_run)
		header("location:products.php");
	else	
		echo '<script>alert("Something went wrong.. Please try again..")</script>';
		echo '<script>location.href="products.php"</script>';	
	mysqli_close($con);
?>