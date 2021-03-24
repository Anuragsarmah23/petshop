<?php
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$customerID=$_SESSION["customerID"];
	$no=rand(1000,9999);
	$tid=$customerID.$no;
	$totalA1=0;
	$totalA2=0;
	$q5="select * from cart where customerID='$customerID' and petID is not null";
	$q5_run=mysqli_query($con,$q5);
	$rowsP=mysqli_num_rows($q5_run);
	if($rowsP > 0){
		while($row5=mysqli_fetch_assoc($q5_run)){	
			$cIDPet=$row5["id"];
			$petID=$row5["petID"];
			$totalAmount1=$row5["totalAmount"];
			$q="insert into transaction(id,customerID,petID,totalAmount,status) values('$tid','$customerID','$petID','$totalAmount1','pending')";
			$q_run=mysqli_query($con,$q);
			if($q_run){	
				$qtyPet=$row5["cartQty"];
				$totalA1=$totalA1+$totalAmount1;
				$q2="select * from pets where id='$petID'";
				$q2_run=mysqli_query($con,$q2);
				$row2=mysqli_fetch_assoc($q2_run);
				$quantityPet=$row2["qty"];
				$NquantityPet=$quantityPet-$qtyPet;
				$q3="update pets set qty='$NquantityPet' where id='$petID'";
				$q3_run=mysqli_query($con,$q3);
				$q26="delete from cart where id='$cIDPet'";
				$q26_run=mysqli_query($con,$q26);
				
			}else{
				echo '<script>alert("Something Went Wrong...Please Try Again");</script>';
				echo '<script>
						setTimeout(function (){
							location.href="cart.php";
						});
					  </script>';
			
			}
		
		}	
	}
	$q6="select * from cart where customerID='$customerID' and supplyID is not null";
	$q6_run=mysqli_query($con,$q6);
	$rowsS=mysqli_num_rows($q6_run);
	if($rowsS > 0){
		while($row6=mysqli_fetch_assoc($q6_run)){	
			$cid=$row6["id"];
			$supplyID=$row6["supplyID"];
			$totalAmount2=$row6["totalAmount"];
			$q111="insert into transaction(id,customerID,supplyID,totalAmount,status) values('$tid','$customerID','$supplyID','$totalAmount2','pending')";
			$q111_run=mysqli_query($con,$q111);
			if($q111_run){	
				$qty=$row6["cartQty"];
				$totalA2=$totalA2+$totalAmount2;
				$q112="select * from supplies where id='$supplyID'";
				$q112_run=mysqli_query($con,$q112);
				$row112=mysqli_fetch_assoc($q112_run);
				$quantity=$row112["qty"];
				$Nquantity=$quantity-$qty;
				$q113="update supplies set qty='$Nquantity' where id='$supplyID'";
				$q113_run=mysqli_query($con,$q113);
				$q116="delete from cart where id='$cid'";
				$q116_run=mysqli_query($con,$q116);
				
			}else{
				echo '<script>alert("Something Went Wrong...Please Try Again");</script>';
				echo '<script>
						setTimeout(function (){
							location.href="cart.php";
						});
					  </script>';
			}
		
		}
	}
?>		
<script>var tid="<?php echo $tid; ?>";</script>
<script>var amount="<?php echo $totalA1+$totalA2; ?>";</script>
<script>alert("Book Order Confirmed with transaction ID: "+tid+"\n with total amount: "+amount)</script>
<script>
	setTimeout(function (){
		location.href="transactionsUser.php";
	});
</script>
