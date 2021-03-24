<?php
	session_start();
	$con=mysqli_connect('localhost','root','','petshop');
	if(!$con){
		die("CONNECTION NOT FOUND".mysqli_error());
	}
	$id=$_SESSION["supplyIDP"];
	$customerID=$_SESSION["customerID"];
	$price=$_SESSION["supplyPriceP"];	
	$no=rand(1000,9999);
	$tid=$customerID.$no;
	$q="insert into transaction(id,customerID,supplyID,totalAmount,status) values('$tid','$customerID','$id','$price','pending')";
	$q_run=mysqli_query($con,$q);
	if($q_run){
		$q2="select * from supplies where id='$id'";
		$q2_run=mysqli_query($con,$q2);
		$row2=mysqli_fetch_assoc($q2_run);
		$quantity=$row2["qty"];
		$Nquantity=$quantity-1;
		$q3="update supplies set qty='$Nquantity' where id='$id'";
		$q3_run=mysqli_query($con,$q3);
?>		
		<script>var tid="<?php echo $tid; ?>";</script>
		<script>var price="<?php echo $price; ?>";</script>
		<script>alert("Book Order Confirmed with transaction ID: "+tid+"\n with total amount: "+price)</script>';
		<script>
			setTimeout(function (){
				location.href="transactionsUser.php";
			});
		</script>
<?php	
	}	
	else{
?>		
		<script>var supplyID="<?php echo $id ;?>";</script>
		<script>alert("Something went wrong..Please try again..");</script>
		<script>
			 setTimeout(function (){
				location.href="viewSupply.php?id="+supplyID;
			});
		</script>
<?php		
	}	
?>	