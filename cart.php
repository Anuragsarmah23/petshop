<?php
	session_start();
	$customerID=$_SESSION["customerID"];
?>
<html>
	<head>
		<title>Cart|PET SHOP</title>
		<link rel="stylesheet" href="css/view.css">
	</head>
	<body>
		<div class="container">
			<div class="nav">
				<div class="nav-logo">
					<a href="index.php"><span>PET SHOP</span></a>
				</div>
			</div>
			<div class="mainContent2" style="height:75vh;overflow:auto;">
				<div class="content">
					<?php 
						$con=mysqli_connect('localhost','root','','petshop');
						if(!$con){
							die("CONNECTION NOT FOUND".mysqli_error());
						}
						$q1="select * from cart where customerID='$customerID'";
						$q1_run=mysqli_query($con,$q1);
						$q="select * from cart where customerID='$customerID' and petID is not null";
						$q_run=mysqli_query($con,$q);	
						$q3="select * from cart where customerID='$customerID' and supplyID is not null";
						$q3_run=mysqli_query($con,$q3);
						$rowsC=mysqli_num_rows($q1_run);
						$rowsP=mysqli_num_rows($q_run);
						$rowsS=mysqli_num_rows($q3_run);
						$totalAmount2=0;
						$totalAmount1=0;
						$i=0;
					?>
					<div>
						<img src="img/pets/shopping.jpg" height="50" width="50" alt="Cart" style="float:left;margin-right:45px;border-radius:50%;">
						<p style="float:right;font-size:20px;color:1122ee;">ITEMS IN CART</p>
					</div>
					<div style="padding-top:60px;">
					<?php if($rowsC > 0){ 
							if($rowsP > 0){
							
					?>
						<table style="border-spacing:35px 25px;width:100%;">
							<tr>
								<th class="head">SL.NO.</th>
								<th class="head">Pet</th>
								<th class="head">Breed</th>
								<th class="head">Quantity</th>
								<th class="head">Base Amount</th>
								<th class="head">Total Amount</th>
								<th class="head">Remove From Cart</th>
							</tr>
							<?php 
								
								
									while($row=mysqli_fetch_assoc($q_run)){ 
									$i++;
									$cid=$row["id"];
									$petID=$row["petID"];
									$q2="select * from pets where id='$petID'";
									$q2_run=mysqli_query($con,$q2);
									$row2=mysqli_fetch_assoc($q2_run);
							?>	
							<tr class="rowData">
								<td class="data"><?php echo $i; ?></td>
								<td class="data"><?php echo $row2['type']; ?></td>
								<td class="data"><?php echo $row2['breed']; ?></td>
								<td class="data"><?php echo $row['cartQty']; ?></td>
								<td class="data"><?php echo $row['baseAmount']; ?></td>
								<td class="data"><?php echo $row['totalAmount']; ?></td>
								<td class="data"><a style="text-decoration:none;color:red;background:#22ffcb;padding:5px;" href="removeCartItem.php?id=<?php echo $cid; ?>">Remove</a></td>
							</tr>
						<?php 
								$totalAmount1=$totalAmount1+$row['totalAmount'];
								} 
						?>
						</table>
						<?php
							}
							else{
								echo '<center><p style="font-size:25px;"><b>No Pets added</b></p>';
								echo '<a href="productsUser.php" style="text-decoration:none;font-size:20px;">Add</a>';
							}
						?>
						<?php 
							if($rowsS > 0){ 		
						?>
						<table style="border-spacing:35px 25px;width:100%;">
							<tr>
								<th class="head">SL.NO.</th>
								<th class="head">Product</th>
								<th class="head">Item</th>
								<th class="head">Quantity</th>
								<th class="head">Base Amount</th>
								<th class="head">Total Amount</th>
								<th class="head">Remove From Cart</th>
							</tr>
							<?php 
									
									while($row3=mysqli_fetch_assoc($q3_run)){ 
									$i++;
									$cid=$row3["id"];
									$supplyID=$row3["supplyID"];
									$q45="select * from supplies where id='$supplyID'";
									$q45_run=mysqli_query($con,$q45);
									$row45=mysqli_fetch_assoc($q45_run);
							?>
								
							<tr class="rowData">
								<td class="data"><?php echo $i; ?></td>
								<td class="data"><?php echo $row45['type']; ?></td>
								<td class="data"><?php echo $row45['item']; ?></td>
								<td class="data"><?php echo $row3['cartQty']; ?></td>
								<td class="data"><?php echo $row3['baseAmount']; ?></td>
								<td class="data"><?php echo $row3['totalAmount']; ?></td>
								<td class="data"><a style="text-decoration:none;color:red;background:#22ffcb;padding:5px;" href="removeCartItem.php?id=<?php echo $cid; ?>">Remove</a></td>
							</tr>
							<?php 
								$totalAmount2=$totalAmount2+$row3['totalAmount'];
								} 
							}else{
								echo '<center><p style="font-size:25px;"><b>No Supplies added</b></p>';
								echo '<a href="productsUser.php" style="text-decoration:none;font-size:20px;">Add</a>';
							}
							?>
						</table>
						
						<p style="padding-left:35px;">Total Amount To Be Paid: <b>Rs. <?php echo $totalAmount=$totalAmount1+$totalAmount2; ?></b> </p>
						<form method="post" action="buyCartParse.php" style="padding-left:35px;">
							<input type="submit" value="BUY" name="transactionSubmit" class="btn"><br><br><br>
							<a href="productsUser.php" style="text-decoration:none;font-size:20px;">Add More</a>
						</form>
						<?php }else{ ?>
							<center><p style="font-size:25px;"><b>Nothing added to cart</b></p>
							<a href="productsUser.php" style="text-decoration:none;font-size:20px;">BUY PRODUCTS</a></center>
						<?php } ?>
					</div>
				</div>
			</div>
			<div class="footer">
				Copyright &copy; 2018 PET SHOP
			</div>
		</div>
	</body>
</html>