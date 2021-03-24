<?php
	$File=basename($_FILES["File"]["name"]);
	$target_dir = "img/pets/";
	$target_file = $target_dir.$File;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$erroR=1;
	if ($_FILES["File"]["size"] > 524288){
		echo "<script>alert('Size exceeded.. select a smaller size image')</script>";
		echo "<script>window.history.back();</script>";
		$erroR=0;
	}	
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"){ 
		echo "<script>alert('File type must be jpg or png')</script>";
		echo "<script>window.history.back();</script>";
		$erroR=0;
	}	
	if($erroR==1){
		$con=mysqli_connect('localhost','root','','petshop');
		if(!$con){
			die("CONNECTION NOT FOUND".mysqli_error());
		}
		$type1=mysqli_real_escape_string($con,$_POST['type']);
		$type=strtolower($type1);
		$item1=mysqli_real_escape_string($con,$_POST['item']);
		$item=strtolower($item1);
		$price=mysqli_real_escape_string($con,$_POST['price']);
		$dPrice=$price/4;
		$qty=mysqli_real_escape_string($con,$_POST['qty']);
		$discount=mysqli_real_escape_string($con,$_POST['discount']);
		$no=rand(1000,9999);
		$id=$item.$no;
		$fileName=$id.".".$imageFileType;
		$targetDir=$target_dir.$fileName;
		if($qty <= 0){
			echo "<script>alert('Quantity cannot be zero')</script>";
			echo "<script>window.history.back();</script>";
		}
		else{
			if($discount>$dPrice){
				echo "<script>alert('Discount cannot exceed 25%')</script>";
				echo "<script>window.history.back();</script>";
				die();
			}
			$q1="select * from supplies where type='$type' and item='$item'";
			$q1_run=mysqli_query($con,$q1);
			$rows=mysqli_num_rows($q1_run);
			if($rows > 0){
				echo '<script>alert("Supply exist.. update the quantity of the supply.")</script>';
				echo '<script>location.href="products.php";</script>';
			}	
			else{	
				if (move_uploaded_file($_FILES["File"]["tmp_name"], $targetDir)){
					$q="insert into supplies(type,item,price,qty,discount,pic) values('$type','$item','$price','$qty','$discount','$fileName')";
					$q_run=mysqli_query($con,$q);
					if($q_run){
						echo "<script>alert('success')</script>";
						echo '<script>location.href="products.php";</script>';
					}
					else{	
						echo "1";
					}	
				}	
				else{	
						echo "<script>alert('File Upload Error')</script>";
						echo '<script>window.history.back();</script>';
					}	
			}
		}
		mysqli_close($con);
	}
?>