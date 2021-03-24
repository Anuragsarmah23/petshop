<?php
$con=mysqli_connect("localhost","root","","petshop");
if(!$con)
	die("Error");
$id=$_POST['tid'];
$q="update transaction set status='completed' where tid='$id'";
$q_run=mysqli_query($con,$q);
header("location:transactions.php");
?>