<?php
$con=mysqli_connect("localhost","root","","petshop");
if(!$con)
	die("Error");
$id=$_GET['tid'];
$q="delete from transaction where tid='$id'";
$q_run=mysqli_query($con,$q);
header("location:transactions.php");
?>